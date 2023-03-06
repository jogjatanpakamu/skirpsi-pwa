(function Main() {
  'use strict';

  var isOnline = 'onLine' in navigator ? navigator.onLine : true;
  var isLoggedIn = /isLoggedIn=1/.test(document.cookie.toString() || '');
  var usingSW = 'serviceWorker' in navigator;
  var swRegistration;
  var svcworker;
  let data_pesanan = '';
  var form_data_pesanan = $('#form_data_pesanan');

  var btn_pesan = $('#btn_pesan');
  var card_pesanan = $('.laman-pesanan');
  document.addEventListener('DOMContentLoaded', ready, false);

  $('.btn_form_pesanan').on('click', function (e) {
    btn_pesan.removeClass('d-none');
    card_pesanan.removeClass('d-none');
    $('input[name="nama_pemesan"]').focus();
  });

  if (usingSW) {
    initServiceWorker().catch(console.error);
  }

  function ready() {
    window.addEventListener('online', function online() {
      isOnline = true;
      sendStatusUpdate();
    });

    window.addEventListener('offline', function offline() {
      isOnline = false;
      sendStatusUpdate();
    });
  }

  async function initServiceWorker() {
    swRegistration = await navigator.serviceWorker.register('sw.js', {
      updateViaCache: 'none'
    });

    svcworker = swRegistration.installing || swRegistration.waiting || swRegistration.active;
    sendStatusUpdate(svcworker);

    navigator.serviceWorker.addEventListener('controllerchange', function onController() {
      svcworker = navigator.serviceWorker.controller;
      sendStatusUpdate(svcworker);
    });

    navigator.serviceWorker.addEventListener('message', onSWMessage);
  }

  function onSWMessage(event) {
    console.log(event);
    var { data } = event;
    if (data.requestStatusUpdate) {
      console.log('Received status, respondindasdg...');
      sendStatusUpdate(event.ports && event.ports[0]);
    } else if (data == 'force-logout') {
      document.cookie = 'isLoggedIn=';
      isLoggedIn = false;
      sendStatusUpdate();
    }
  }

  function sendStatusUpdate(target) {
    sendSWMessage({ statusUpdate: { isOnline, isLoggedIn } }, target);
  }

  function sendSWMessage(msg, target) {
    if (target) {
      target.postMessage(msg);
    } else if (svcworker) {
      svcworker.postMessage(msg);
    } else {
      navigator.serviceWorker.controller.postMessage(msg);
    }
  }

  form_data_pesanan.on('change', function (e) {
    const form = $('#form_data_pesanan').serializeArray();
    const data = form.reduce((acc, { name, value }) => ({ ...acc, [name]: value }), {});
    data_pesanan = data;
  });

  $('#btn_pesan').on('click', function () {
    if (isLoggedIn) {
      if (isOnline) {
        console.log(data_pesanan);
        if (!data_pesanan.nama_pemesan || !data_pesanan.email || !data_pesanan.telpon || !data_pesanan.catatan) {
          Swal.fire({
            icon: 'warning',
            title: 'Data kamu belum lengkap ',
            timer: 2000
          });
        } else {
          $.ajax({
            type: 'POST',
            url: 'model/pesanan.php',
            data: {
              idPesanan: '',
              produk_id: data_pesanan.produk_id,

              nama_pemesan: data_pesanan.nama_pemesan,
              email: data_pesanan.email,
              telpon: data_pesanan.telpon,
              catatan: data_pesanan.catatan,
              code: 'create'
            },
            success: function (data) {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                timer: 2000
              }).then(() => {
                window.location.href = 'riwayat-belanja.php';
              });
            }
          });
        }
      } else {
        Swal.fire({
          icon: 'warning',
          title: 'Kamu lagi ofline ',
          timer: 2000
        });
      }
    } else {
      Swal.fire({
        icon: 'warning',
        title: 'Pastikan kamu udah login ',
        timer: 2000
      });
    }
  });

  $('body').on('click', '#btn-wa', function () {
    const id = $(this).data('id');
    var win = window.open(
      'https://api.whatsapp.com/send?phone=' + 6289694273720 + `&text=http%3A%2F%2Flocalhost%2Fpesanan.php%3Fpesid%3D${id}`
    );
    if (win) {
      win.focus();
    } else {
      alert('Please allow popups for this website');
    }
    return false;
  });

  $('body').on('click', '#btn-wa-konfirmasi', function () {
    const id = $(this).data('id');
    var win = window.open(
      'https://api.whatsapp.com/send?phone=' + id + '&text=hallo%20kak%2C%20pesanan%20kamu%20sudah%20di%20konfirmasi%20ya'
    );
    if (win) {
      win.focus();
    } else {
      alert('Please allow popups for this website');
    }
    return false;
  });
})(window);
