$( document ).ready(function() {

  //#region general

  //sticky header

  $(window).scroll(function() {
		var height = $(window).scrollTop();
		if(height  > 0) {
			$("#myHeader").addClass("sticky");
		} else{
			$("#myHeader").removeClass("sticky");
		}
	});


  //delay function
  function delay1(callback, ms) {
    var timer = 0;
    return function() {
      var context = this, args = arguments;
      clearTimeout(timer);
      timer = setTimeout(function () {
        callback.apply(context, args);
      }, ms || 0);
    };
  }

  //tooltip
  $('[data-toggle="tooltip"]').tooltip();

  //unique array
  function getUnique(array){
    var uniqueArray = [];
    
    // Loop through array values
    for(i=0; i < array.length; i++){
        if(uniqueArray.indexOf(array[i]) === -1) {
            uniqueArray.push(array[i]);
        }
    }
    return uniqueArray;
  }

  //#endregion

  //#region owl-carousel
  $('.banner-slide').owlCarousel({
    loop:true,
    nav: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: false,
    navText: ["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"],
    items: 1,
    responsive : {
      0 : {
        dots: false,
      },
      768 : {
        dots: true,
      }
    }
  })
  $('.products-slide').owlCarousel({
    dots: true,
    loop: true,
    margin: 10,
    dotsEach: 2,
    responsive : {
      0 : {
        items:2,
      },
      768 : {
        items:3,
      },
      991 : {
        items:4,
      }
    }
  })
  $('.relate-products-slide').owlCarousel({
    dots: true,
    loop: true,
    margin: 10,
    dotsEach: 2,
    responsive : {
      0 : {
        items:2,
      },
      768 : {
        items:3,
      },
      991 : {
        items:4,
      }
    }
  })

  //#endregion

  //#region userform
  $('#userlogin').click( function(event) {
    event.preventDefault();
    var scrollTop = ($('html').scrollTop()) ? $('html').scrollTop() : $('body').scrollTop();
    $('html').addClass('noscroll').css('top',-scrollTop);
    $("#userform").removeClass();
    $("#userform").addClass("d-block");
    return false;
  } );

  $('#closelogin, #close-login').click( function(event) {
    event.preventDefault();
    var userform = document.getElementById("userform");
    var loginform = document.getElementById("loginform");
    var regform = document.getElementById("regform");
    var forpassform = document.getElementById("forpassform");
    var forpasser=document.getElementById("forpass-error");
    var loger=document.getElementById("login-error");
    var reger=document.getElementById("reg-error");
    var scrollTop = parseInt($('html').css('top'));
    $('html').removeClass('noscroll');
    $('html,body').scrollTop(-scrollTop);
    userform.className = '';
    regform.classList.remove("d-block");
    forpassform.classList.remove("d-block");
    loginform.reset();
    regform.reset();
    forpassform.reset();
    forpasser.innerHTML = "";
    loger.innerHTML= "";
    reger.innerHTML= "";
    return false;
  } );

  $('#reg-btn').click( function(event) {
    event.preventDefault();
    $("#regform").addClass("d-block");
    return false;
  } );

  $('#backlogreg-btn').click( function(event) {
    event.preventDefault();
    var loger=document.getElementById("login-error");
    var loginform = document.getElementById("loginform");
    var reger=document.getElementById("reg-error");
    var regform = document.getElementById("regform");
    regform.classList.remove("d-block");
    loger.classList.remove("d-none");
    loginform.reset();
    regform.reset();
    loger.innerHTML= "";
    reger.innerHTML= "";
    return false;
  } );

  $('#forpass-btn').click( function(event) {
    event.preventDefault();
    var forpassform = document.getElementById("forpassform");
    forpassform.classList.add("d-block");
    return false;
  } );

  $('#backlogforpass-btn').click( function(event) {
    event.preventDefault();
    var forpassform = document.getElementById("forpassform");
    var loger=document.getElementById("login-error");
    var loginform = document.getElementById("loginform");
    var forpasser=document.getElementById("forpass-error");
    forpassform.classList.remove("d-block");
    forpassform.reset();
    loginform.reset();
    loger.innerHTML= "";
    forpasser.innerHTML= "";
    return false;
  } );

  //m-user
  $('#mbacklogreg-btn').click( function(event) {
    event.preventDefault();
    var mloger=document.getElementById("mlogin-error");
    var mloginform = document.getElementById("mloginform");
    var mreger=document.getElementById("mreg-error");
    var mregform = document.getElementById("mregform");
    mregform.classList.remove("d-block");
    mloger.classList.remove("d-none");
    mloginform.reset();
    mregform.reset();
    mloger.innerHTML= "";
    mreger.innerHTML= "";
    return false;
  } );

  $('#mforpass-btn').click( function(event) {
    event.preventDefault();
    var mforpassform = document.getElementById("mforpassform");
    mforpassform.classList.add("d-block");
    return false;
  } );

  $('#mbacklogforpass-btn').click( function(event) {
    event.preventDefault();
    var mforpassform = document.getElementById("mforpassform");
    var mloger=document.getElementById("mlogin-error");
    var mloginform = document.getElementById("mloginform");
    var mforpasser=document.getElementById("mforpass-error");
    mforpassform.classList.remove("d-block");
    mforpassform.reset();
    mloginform.reset();
    mloger.innerHTML= "";
    mforpasser.innerHTML= "";
    return false;
  } );
  $('#loguser, #logpass').keyup(function(e){
    if(e.keyCode == 13)
    {
      $('#btn-logform').click();
    }
  });

  $('#btn-logform').click(function() {
    var vloguser = $("#loguser").val();
    var vlogpass = $("#logpass").val();
    var url = window.location.href;
    $.ajax({
      type: "POST",
      url: '?controller=login',
      data: {cloguser: vloguser, clogpass: vlogpass},
      success: function(data)
      { 
        if (data == 'login success') {
          window.location.href = url;
        }
        else {
          $("#login-error").html(data);
        }
      }
    });
  });

  $('#reguser, #regemail, #regpass, #retyperegpass').keyup(function(e){
    if(e.keyCode == 13)
    {
      $('#btn-regform').click();
    }
  });

  //validate register account
  /* $('#reguser, #regemail, #regpass, #retyperegpass').keyup(delay1(function() {
    var vreguser = $("#reguser").val();
    var vregemail = $("#regemail").val();
    var vregpass = $("#regpass").val();
    var vretyperegpass = $("#retyperegpass").val();
    $.ajax({
      type: "POST",
      url: '?controller=checkuserreg',
      data: {creguser: vreguser, cregemail: vregemail, cregpass: vregpass, cretyperegpass: vretyperegpass},
      success: function(data)
      { 
        $("#reg-error").html(data);
      }
    });
  },500)); */

  $('#regform input').keyup(delay1(function() {
    var vid = $(this).attr('id');
    var vreguser = $("#reguser").val();
    var vregemail = $("#regemail").val();
    var vregpass = $("#regpass").val();
    var vretyperegpass = $("#retyperegpass").val();
    $.ajax({
      type: "POST",
      url: '?controller=checkuserreg',
      data: { cid: vid, creguser: vreguser, cregemail: vregemail, cregpass: vregpass, cretyperegpass: vretyperegpass },
      success: function(data)
      { 
        $("#reg-error").html(data);
      }
    });
  },500));


  //register account
  $('#btn-regform').click(function() {
    var vreguser = $("#reguser").val();
    var vregemail = $("#regemail").val();
    var vregpass = $("#regpass").val();
    var vretyperegpass = $("#retyperegpass").val();
    $.ajax({
      type: "POST",
      url: '?controller=userreg',
      data: {creguser: vreguser, cregemail: vregemail, cregpass: vregpass, cretyperegpass: vretyperegpass},
      success: function(data)
      {
        $("#reg-error").html(data);
      }
    });
  });

  //#endregion

  //#region search

  //show seach
  $('#show-search').click( function(event) {
    event.preventDefault();
    var search = document.getElementById("search");
    search.classList.add("d-block");
    $( "#searchinput" ).focus();
    var scrollTop = ($('html').scrollTop()) ? $('html').scrollTop() : $('body').scrollTop();
    $('html').addClass('noscroll').css('top',-scrollTop);   
    return false;
  } );

  //close search
  $('#closesearch').click( function(event) {
    event.preventDefault();
    var search = document.getElementById("search");
    search.classList.remove("d-block");
    $('#searchinput').val('');
    var scrollTop = parseInt($('html').css('top'));
    $('html').removeClass('noscroll');
    $('html,body').scrollTop(-scrollTop);
    return false;
  } );

  //search submit
  $('#searchinput').keydown(function(e){
    if(e.keyCode == 13)
    {
      e.preventDefault();
      var vkeyword = $('#searchinput').val();
      $.ajax({
        type: "POST",
        url: '?controller=search',
        data: {ckeyword: vkeyword},
        success: function(data)
        {
          if (data == 'blank') {
            $("#searchinput").removeClass("search-input");
            $("#searchinput").addClass("search-input-blank");
            setTimeout(function(){
              $("#searchinput").removeClass("search-input-blank");
              $("#searchinput").addClass("search-input");
            }, 500);
          }
          else {
            window.location.href = '?controller=collection&keyword='+data+'';
          }
        }
      });
    }
  });

  //search preview
  $('#searchinput').keyup(delay1(function() {
    var vkeyword = $('#searchinput').val();
      $.ajax({
        type: "POST",
        url: '?controller=previewsearch',
        data: {ckeyword: vkeyword},
        beforeSend: function() {
          if(vkeyword != '') {
            $('#search-result .row').html("<div class='text-center w-100'><img src='./image/cat-loading.gif' width='128px' height='128px'></div>");
          }
        },
        success: function(data)
        {
          setTimeout(function() {
            $('#search-result .row').html(data);
          }, 500);
        }
      });
  },500));

  //#endregion

  //#region m-menu
  var acc = document.getElementsByClassName("accordion");
  var i;
  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      var panel = this.parentElement.parentElement.nextElementSibling;
      var choosen = this.parentElement.previousElementSibling;
      if (panel.style.display === "block") {
        panel.style.display = "none";
        this.innerHTML='<i class="far fa-chevron-right"></i>';
        choosen.style.color = "black";
      } else {
        panel.style.display = "block";
        this.innerHTML='<i class="far fa-chevron-down"></i>';
        choosen.style.color = "tomato";
      }
    });
  }

  $('#m-menu-btn').click( function(event) {
    event.preventDefault();
    var m_menu = document.getElementById('m-menu');
    var scrollTop = ($('html').scrollTop()) ? $('html').scrollTop() : $('body').scrollTop();
    $('html').addClass('noscroll').css('top',-scrollTop);
    m_menu.classList.add('d-flex');
  } );

  $('#close-m-menu, #m-menu-close').click( function(event) {
    event.preventDefault();
    var m_menu = document.getElementById('m-menu');
    m_menu.classList.remove("d-flex");
    $("#m-first-menu").hide();
    for (i = 0; i < acc.length; i++) {
      var panel = acc[i].parentElement.parentElement.nextElementSibling;
      var choosen = acc[i].parentElement.previousElementSibling;
      panel.style.display = "none";
      acc[i].innerHTML='<i class="far fa-chevron-right"></i>';
      choosen.style.color = "black";
    }
    var scrollTop = parseInt($('html').css('top'));
    $('html').removeClass('noscroll');
    $('html,body').scrollTop(-scrollTop);
    return false;
  } );

  $("#m-open-first-menu").click( function(event) {
    event.preventDefault();
    $("#m-first-menu").show();
  } );

  $("#m-close-first-menu").click( function(event) {
    event.preventDefault();
    $("#m-first-menu").hide();
  } );

  $('#mreg-btn').click( function(event) {
    event.preventDefault();
    $("#mregform").addClass("d-block");
    return false;
  } );

  //#endregion

  //#region filter

  $("#open-m-filter").click( function(event) {
    event.preventDefault();
    var scrollTop = ($('html').scrollTop()) ? $('html').scrollTop() : $('body').scrollTop();
    $('html').addClass('noscroll').css('top',-scrollTop);
    $("#m-filter-bar").show();
  } );

  $("#close-m-filter, #m-close-filter").click( function(event) {
    event.preventDefault();
    $("#m-filter-bar").hide();
    var scrollTop = parseInt($('html').css('top'));
    $('html').removeClass('noscroll');
    $('html,body').scrollTop(-scrollTop);
  } );

  $('li :checkbox').on('click', function () {
    var $chk = $(this),
        $li = $chk.closest('li'),
        $ul, $parent;
    if ($li.has('ul')) {
        $li.find(':checkbox').not(this).prop('checked', this.checked)
    }
    do {
        $ul = $li.parent();
        $parent = $ul.siblings(':checkbox');
        if ($chk.is(':checked')) {
            $parent.prop('checked', $ul.has(':checkbox:not(:checked)').length == 0)
        } else {
            $parent.prop('checked', false)
        }
        $chk = $parent;
        $li = $chk.closest('li');
    } while ($ul.is(':not(.someclass)'));
  });

  var acc1 = document.getElementsByClassName("accordion1");
  var y;
  for (y = 0; y < acc1.length; y++) {
    acc1[y].addEventListener("click", function() {
      var panel = this.parentElement.nextElementSibling;
      if (panel.style.display === "block") {
        panel.style.display = "none";
        this.innerHTML='<i class="far fa-chevron-right"></i>';
      } else {
        panel.style.display = "block";
        this.innerHTML='<i class="far fa-chevron-down"></i>';
      }
    });
  }

  /* $("#checkbox1").change(function() {
    $("#checkbox2").prop("checked", this.checked);
  }); */

  $('#filter-cate-form input:checkbox, #filter-brand-form input:checkbox, #filter-price-form input:radio').change(function() {
    $("#filter-cate-form").submit();
    $("#filter-brand-form").submit();
    $("#filter-price-form").submit();
  });
  /* $('#m-filter-cate-form input:checkbox, #m-filter-brand-form input:checkbox, #m-filter-price-form input:radio').change(function() {
    $("#m-filter-cate-form").submit();
    $("#m-filter-brand-form").submit();
    $("#m-filter-price-form").submit();
  }); */

  $('#filter-cate-form, #filter-brand-form, #filter-price-form').on('submit',function (e) {
    var filter_cate = [];
    var filter_brand = [];
    var filter_price = [];
    $("#filter-price-form input:radio[name='filter-price']:checked, #m-filter-price-form input:radio[name='filter-price']:checked").each(function(){
      filter_price.push($(this).val());
    });
    $("#filter-brand-form input:checkbox[name='filter-brand']:checked, #m-filter-brand-form input:checkbox[name='filter-brand']:checked").each(function(){
      filter_brand.push($(this).val());
    });
    $("#filter-cate-form input:checkbox[name='filter-cate']:checked, #m-filter-cate-form input:checkbox[name='filter-cate']:checked").each(function(){
      filter_cate.push($(this).val());
    });
    filter_cate = getUnique(filter_cate);
    filter_brand = getUnique(filter_brand);
    filter_price = getUnique(filter_price);
    var jsonStringCate = JSON.stringify(filter_cate);
    var jsonStringBrand = JSON.stringify(filter_brand);
    var jsonStringPrice = JSON.stringify(filter_price);
    var current_url = window.location.href;
    var cut_url = current_url.slice( 0, current_url.indexOf('controller') );
    var url = new URL(''+current_url+'');
    var new_url = new URLSearchParams(url.search);
    new_url.delete('filter_cate');
    new_url.delete('filter_brand');
    new_url.delete('filter_price');
    new_url.delete('page');
    var vkeyword = new_url.get('keyword');
    $.ajax({
      type: "POST",
      url: "?controller=filterurl",
      data: { cfilcate : jsonStringCate, cfilbrand : jsonStringBrand, cfilprice : jsonStringPrice },
      dateType: 'JSON',
      success: function(data1)
      { 
        var result = JSON.parse(data1);
        url = '';
        url += cut_url+new_url+result.cate+result.brand+result.price;
        window.history.replaceState(null, null, ''+url+'');
        /* $.ajax({
          type: "POST",
          url: "?controller=filter",
          data: { cfilcate : filter_cate, cfilbrand : filter_brand, cfilprice : filter_price, ckeyword : vkeyword},
          beforeSend: function() {
            $('#collection-product .row').html("<div class='text-center w-100'><img src='./image/cat-loading.gif' width='256px' height='256px'></div>");
          },
          success: function(data2)
          {
            setTimeout(function() {
              var result2 = JSON.parse(data2);
              $('#collection-product .row').html(result2.product);
              $('#collection-page-form').html(result2.page);
            }, 500);
          }
        }); */
        location.reload();
      }
    });
    e.preventDefault();
  });

  //#endregion

  //#region pagination

  $("#collection-page-form input:radio[name='page']").change( function() {
    $("#collection-page-form").submit();
  } );

  $('#collection-page-form').on('submit',function () {
    var vpage = $('#collection-page-form input:radio[name="page"]:checked').val();
    var current_url = window.location.href;
    var cut_url = current_url.slice( 0, current_url.indexOf('controller') );
    var url = new URL(''+current_url+'');
    var new_url = new URLSearchParams(url.search);
    new_url.delete('page');
    $.ajax({
      type: "POST",
      url: "?controller=pageurl",
      data: { cpage : vpage },
      success: function(data1)
      { 
        url = '';
        url += cut_url+new_url+data1;
        window.location.href = /* ''+cut_url+new_url+data1+'' */url;
      }
    });
  });

  //#endregion

  //#region addcart

  $(".addcart-btn a").click(function(event) {
    $vid = $(this).attr('data-id');
    $.ajax({
      type: "POST",
      url: "?controller=addcart",
      data: { cid : $vid },
      success: function(data)
      { 
        var result = JSON.parse(data);
        if(result.status == 'success') {
          $('#cart-btn span').html(result.cart_num);
          $('.addcart-response').show();
          $('.addcart-response-box').html('<div class="addcart-success">Thêm vào giỏ hàng thành công</div>');
          setTimeout(function() {
            $('.addcart-response').hide();
          }, 1000);
        }
        if(result.status == 'fail') {
          $('#cart-btn span').html(result.cart_num);
          $('.addcart-response-box').html('<div class="addcart-fail">Thêm vào giỏ hàng thất bại, vui lòng thử lại</div>');
          setTimeout(function() {
            $('.addcart-response').hide();
          }, 1000);
        }
      }
    });
    event.preventDefault();
  } );

  $(".detail-addcart .allow-addcart").click(function(event) {
    $vid = $(this).attr('data-id');
    $vcolor = $('input:radio[name="color"]:checked').val();
    $vsize = $('input:radio[name="size"]:checked').val();
    $vweight = $('input:radio[name="weight"]:checked').val();
    $vquantity = $('.cart-quantity-number').val();
    if($vweight == null && (($vcolor != null) || ($vsize != null))) {
      $vweight = 1;
    }
    if($vcolor == null && (($vweight != null) || ($vsize != null))) {
      $vcolor = 1;
    }
    if($vsize == null && (($vcolor != null) || ($vweight != null))) {
      $vsize = 1;
    }
    if($vweight == null && $vsize == null && $vcolor == null) {
      $vweight = 0;
      $vsize = 0;
      $vcolor = 0;
    }
    if($vquantity == '') {
      $vquantity = 1;
    }
    $.ajax({
      type: "POST",
      url: "?controller=addcart",
      data: { cid : $vid , cweight : $vweight , ccolor : $vcolor , csize : $vsize , cquantity : $vquantity },
      success: function(data)
      { 
        var result = JSON.parse(data);
        if(result.status == 'success') {
          $('#cart-btn span').html(result.cart_num);
          $('.addcart-response').show();
          $('.addcart-response-box').html('<div class="addcart-success">Thêm vào giỏ hàng thành công</div>');
          setTimeout(function() {
            $('.addcart-response').hide();
          }, 1000);
        }
        if(result.status == 'fail') {
          $('#cart-btn span').html(result.cart_num);
          $('.addcart-response-box').html('<div class="addcart-fail">Có lỗi xảy ra, vui lòng thử lại</div>');
          setTimeout(function() {
            $('.addcart-response').hide();
          }, 1000);
        }
      }
    });
    event.preventDefault();
  } );

  //#endregion

  //#region change cart

  $('.change-cart-quantity-number').change(function(e) {
    var vnew_quantity = $(this).val();
    var vitem = $(this).attr('id');
    $.ajax({
      type: "POST",
      url: "?controller=changecart",
      data: { cnew_quantity : vnew_quantity, citem : vitem },
      success: function(data)
      {
        /* var result = JSON.parse(data);
        $('.cart-body tbody').html(result.response);
        $('.total-cart span').html(result.total); */
        if (data == 'success') {
          location.reload();
        }
      }
    });
    e.preventDefault();
  });

  $(".change-cart-quantity .inc-quantity").on("click", function(e) {

    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    if (oldValue < 99) {
      var newVal = parseFloat(oldValue) + 1;
    }
    else {
      newVal = 99;
    }
    $button.parent().find("input").val(newVal).change();
    e.preventDefault();
  
  });

  $(".change-cart-quantity .dec-quantity").on("click", function(e) {

    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    if (oldValue > 1) {
      var newVal = parseFloat(oldValue) - 1;
    }
    else {
      newVal = 1;
    }
    $button.parent().find("input").val(newVal).change();
    e.preventDefault();
  
  });

  $('.change-cart-quantity-number').keydown(function (e) {
    if (e.which === 13) {
      var newVal = $(this).val();
      if (newVal < 1) {
        newVal = 1;
      }
      if (newVal > 99) {
        newVal = 99;
      }
      $(this).val(newVal).change();
      e.preventDefault();
    }
  });

  $('.change-cart-quantity-number, .cart-quantity-number').on('keypress',function(evt) {
    if(evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57) {
      evt.preventDefault();
    }
  });


  //#endregion

  //#region order

  $("#confirm-order-btn").click(function(e) {
    var vomail = $("#order-email").val();
    var voname = $("#order-fullname").val();
    var vophone = $("#order-phone").val();
    var voaddress = $("#order-address").val();
    $.ajax({
      type: "POST",
      url: "?controller=orderform",
      data: { comail : vomail, coname : voname, cophone : vophone, coaddress : voaddress },
      success: function(data)
      { 
        if (data != 'success') {
          $('#orderinfo-error').html(data);
        }
        if (data == 'success') {
          $.ajax({
            type: "POST",
            url: '?controller=checkout',
            data: { comail : vomail, coname : voname, cophone : vophone, coaddress : voaddress },
            success: function(data1)
            {
              if(data1 == 'success') {
                $('.order-response').show();
                $('.order-fail').hide();
                $('.order-success').show();
              }
              if(data1 == 'fail') {
                $('.order-response').show();
                $('.order-success').hide();
                $('.order-fail').show();
              }
            }
          });
        }
      }
    });
    e.preventDefault();
  } );

  $('#order-phone, #account-phone').on('keypress',function(evt) {
    if(evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57) {
      evt.preventDefault();
    }
  });

  $(".back-order a").click(function(e) {
    $(".show-order-detail").hide();
    $(".back-order").hide();
    $("#account-order .cart-table").show();
    $("#account-order .product-page").removeClass('d-none');
    $("#account-order .product-page").addClass('d-flex');
    $(window).scrollTop(0);
    e.preventDefault();
  } );

  $(".detail-order").click(function(e) {
    var vorderid = $(this).attr("data-id")
    $.ajax({
      type: "POST",
      url: "?controller=orderdetail",
      data: { corderid : vorderid },
      success: function(data)
      {
        $("#account-order .cart-table").hide();
        $("#account-order .product-page").removeClass('d-flex');
        $("#account-order .product-page").addClass('d-none');
        $("#account-order .show-order-detail").html(data);
        $("#account-order .show-order-detail").show();
        $(".back-order").show();
      }
    });
    /* $("#account-order .cart-table").hide();
    $("#account-order .product-page").removeClass('d-flex');
    $("#account-order .product-page").addClass('d-none');
    $("#account-order .show-order-detail").show(); */
    e.preventDefault();
  } );

  //#endregion

  //#region account

  //keep active panel when reload
  $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
      localStorage.setItem('activeTab', $(e.target).attr('href'));
  });
  var activeTab = localStorage.getItem('activeTab');
  if(activeTab){
      $('.account-control .nav a[href="' + activeTab + '"]').tab('show');
  };
  if (window.location.href.indexOf("?controller=account") == -1) {
    localStorage.clear();
  }

  $("#confirm-update-account").click(function(e) {
    var vaemail = $("#account-email").val();
    var vaname = $("#account-fullname").val();
    var vaphone = $("#account-phone").val();
    var vaaddress = $("#account-address").val();
    $.ajax({
      type: "POST",
      url: "?controller=accountchange",
      data: { caemail : vaemail, caname : vaname, caphone : vaphone, caaddress : vaaddress },
      success: function(data)
      { 
        if (data != 'success') {
          $('#update-account-info-error').show();
          $('#update-account-info-error').html(data);
        }
        if (data == 'success') {
          $('#update-account-info-error').hide();
          $('.addcart-response').show();
          $('.addcart-response-box').html('<div class="addcart-success">Cập nhật thông tin thành công</div>');
          setTimeout(function() {
            $('.addcart-response').hide();
          }, 1000);
        }
      }
    });
    e.preventDefault();
  } );

  $("#confirm-change-pass").click(function(e) {
    var vconfirmpass = $("#confirm-pass").val();
    var vnewpass = $("#new-pass").val();
    var vretypenewpass = $("#retype-new-pass").val();
    $.ajax({
      type: "POST",
      url: "?controller=acpasschg",
      data: { cconfirmpass : vconfirmpass, cnewpass : vnewpass, cretypenewpass : vretypenewpass },
      success: function(data)
      { 
        if (data != 'success') {
          $('#update-account-pass-error').show();
          $('#update-account-pass-error').html(data);
        }
        if (data == 'success') {
          $('#update-account-pass-error').hide();
          $("#confirm-pass").val('');
          $("#new-pass").val('');
          $("#retype-new-pass").val('');
          $('.addcart-response').show();
          $('.addcart-response-box').html('<div class="addcart-success">Thay đổi mật khẩu thành công</div>');
          setTimeout(function() {
            $('.addcart-response').hide();
          }, 1000);;
        }
      }
    });
    e.preventDefault();
  } );

  //#endregion

  //#region slick productdetail

  $('.big-slick').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dot: false,
    fade: false,
    infinite: false,
  });

  $('.small-slick').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.big-slick',
    dots: false,
    arrows: false,
    infinite: false,
    vertical: true,
    verticalSwiping: true,
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 575,
        settings: {
          vertical: false,
          infinite: false,
        }
      }
    ]
  });

  //#endregion

}); //document.ready

