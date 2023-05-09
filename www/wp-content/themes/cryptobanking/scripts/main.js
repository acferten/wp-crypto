(function () {
  'use strict';

  if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPad/i))) {
    document
      .querySelector('html')
      .classList
      .add('is-ios');
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var html = $('html');

  var pageHeader = $('#js-pageHeader');

  var phToggle = pageHeader.find('#js-phToggle');

  phToggle.on('click', function () {
    pageHeader.toggleClass('page-header--active');
    document.documentElement.classList.toggle('nav-overflow');
  });

  var faqItem = $('.js-faqItem');

  faqItem.on('click', function () {

    if ($(this).hasClass('faq__item--active')) {
      $(this).removeClass('faq__item--active');
    }
    else {
      faqItem.removeClass('faq__item--active');
      $(this).addClass('faq__item--active');
    }

  });

  var pp = $('.js-pp');
  
  if (pp.length) {
    pp.on('click', function (event) {
      if (event.target === this || event.target.classList.contains('js-ppClose')) {
        document.documentElement.classList.remove('pp-overflow');
        $(this).removeClass('pp--active');
      }
    });
  }

  var qrLink = $('#js-QR');
  var qrPP = pp.filter('#js-qrPP');

  if (qrPP.length && qrLink.length && !qrLink.hasClass('js-appBtn')) {
    
    qrLink.on('click', function () {
      document.documentElement.classList.add('pp-overflow');
      qrPP.addClass('pp--active');
    });
  }

  var appPP = pp.filter('#js-appPP');
  var appBtn = $('.js-appBtn');

  if (appPP.length && appBtn.length) {
    appBtn.on('click', function(event) {
      event.preventDefault();
      document.documentElement.classList.add('pp-overflow');
      appPP.addClass('pp--active');
    });
  }


  var questionBtn = $('#js-questionBtn');
  if (questionBtn.length) {
    var ppForm = pp.filter('#js-ppForm');
    questionBtn.on('click', function () {
      document.documentElement.classList.add('pp-overflow');
      ppForm.addClass('pp--active');
    });
  }

  var btnUp = $('#js-btnUp');
  if (btnUp.length) {
    $(window).on('scroll', function () {
      if ($(window).scrollTop() > 300) {
        btnUp.addClass('btn-up--active');
      } else {
        btnUp.removeClass('btn-up--active');
      }
    });

    btnUp.on('click', function (e) {
      e.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, '500');
    });
  }

  function wrapContent(el, wrapTag, wrapClass) {
    if (wrapClass && el.parentNode.classList.contains(wrapClass)) return;
    var wrapper = document.createElement(wrapTag);
    if (wrapClass) wrapper.className = wrapClass;

    el.parentNode.insertBefore(wrapper, el);
    wrapper.appendChild(el);

    if (el.tagName.toLowerCase() === 'img' && el.alt) {
      var figcaption = document.createElement('figcaption');
      figcaption.innerHTML = el.alt;
      wrapper.appendChild(figcaption);
    }
  }

  var content = $('.content');

  $.each(content, function (i) {
    var thisContent = $(this);

    var iframe = thisContent.find('iframe');

    $.each(iframe, function (i) {
      wrapContent(this, 'div', 'adaptive-video');
    });

    var img = thisContent.find('img[alt]:not([align])');

    $.each(img, function (i) {
      if (this.alt)
        wrapContent(this, 'figure');
    });
  });

  var shareLink = $('.sharer');
  $.each(shareLink, function () {
    var thisLink = $(this);
    if (!thisLink.attr('data-url')) {
      thisLink.attr('data-url', window.location.href);
    }
    if (!thisLink.attr('data-title')) {
      thisLink.attr('data-title', $(document).find("title").text());
    }
  });

  var listing = $('#js-listing');

  if (listing.length) {
    var listOne = listing.find('#js-listOne');
    var listTwo = listing.find('#js-listTwo');
    var list = listing.find('#js-list');

    var cardOne = list.find('.news-card:nth-child(6n-5), .news-card:nth-child(6n-4), .news-card:nth-child(6n-2)');
    var cardTwo = list.find('.news-card:nth-child(6n-3), .news-card:nth-child(6n-1), .news-card:nth-child(6n)');

    listOne.append(cardOne);
    listTwo.append(cardTwo);
  }

})();
