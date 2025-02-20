//success: #1bcfb4
// primary: #b66dff
// danger: #fe7c96
// muted: #9C9FA6

document.querySelectorAll('tr .order-status').forEach(function(status_text) {
    // Set Appropriate Text Color
    if (status_text.innerHTML == 'Pending') {
        status_text.style.color = '#b66dff';
    } else if (status_text.innerHTML == 'Canceled') {
        status_text.style.color = '#fe7c96';
    } else {
        status_text.style.color = '#1bcfb4';
    }
  });


document.querySelectorAll('tr .payment-status').forEach(function(status_text) {
    // Set Appropriate Text Color
    if (status_text.innerHTML == 'Unpaid') {
      status_text.style.color = '#fe7c96';
    } else if (status_text.innerHTML == 'Paid') {
        status_text.style.color = '#1bcfb4';
    } else {
        status_text.style.color = '#9C9FA6';
    }
  });


//
// paid-btn
// cancel-btn
// let paid_btn = document.querySelector('.paid-btn');

document.querySelectorAll('tr').forEach(function(row) {
    var orderStatus = row.querySelector('.order-status');
    if (orderStatus && orderStatus.innerHTML == 'Canceled') {
        var paidBtn = row.querySelector('.paid-btn');
        var cancelBtn = row.querySelector('.cancel-btn');
        if (paidBtn) {
            paidBtn.innerHTML = 'Not available';
            paidBtn.style.color = '#9C9FA6';
        }
        if (cancelBtn) {
            cancelBtn.innerHTML = 'Not available';
            cancelBtn.style.color = '#9C9FA6';
        }
    }

    var paymentStatus = row.querySelector('.payment-status');
    if (paymentStatus && paymentStatus.innerHTML == 'Paid') {
        var paidBtn = row.querySelector('.paid-btn');
        if (paidBtn) {
            paidBtn.innerHTML = 'Not available';
            paidBtn.style.color = '#9C9FA6';
        }
    }
});