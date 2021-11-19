<html style="transform: none;"><head>
    <title>Payrshop</title>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="title" content="My Stores">
    <meta name="description" content="business social network payrchat is one of the rising new social media sites in bangladesh. payrchat is the top social networking sites with user registration, login and with awesome features">
    <meta name="keywords" content="Social network, Bangladesh social media, online make money">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="pinterest-rich-pin" content="false">
    <link rel="canonical" href="{{env('HOME_URL')}}/payrshop">
    <link rel="shortcut icon" type="image/png" href="{{env('HOME_URL')}}/themes/wowonder/img/icon.png">
    {{-- <link rel="stylesheet" href="{{env('HOME_URL')}}/themes/wowonder/stylesheet/general-style-plugins.css?version=3.2.1"> --}}
<link rel="stylesheet" href="{{asset('css/general-style-plugins.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script src="https://connect.facebook.net/en_US/sdk.js?hash=48a9e5b6c7600d29b7c636051fedb3bd" async="" crossorigin="anonymous"></script><script src="//media.twiliocdn.com/sdk/js/video/releases/2.8.0/twilio-video.min.js"></script>
    {{-- <link rel="stylesheet" href="{{env('HOME_URL')}}/themes/wowonder/stylesheet/style.css?version=3.2.1"> --}}

    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <script src="{{asset('fontawesome/js/all.js')}}"></script>



    <script src="{{env('HOME_URL')}}/themes/wowonder/javascript/jquery-3.1.1.min.js"></scrip>
    <script src="https://cdn.jsdelivr.net/npm/jquery-ui-touch-punch@0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>


    <link rel="stylesheet" href="{{env('HOME_URL')}}/themes/wowonder/player/fluidplayer.min.css" type="text/css">
    <script src="{{env('HOME_URL')}}/themes/wowonder/player/fluidplayer.min.js"></script>
    <style>
      /* Add here your custom css styles Example: p { text-align: center; color: red; }  */
      a:hover{
          text-decoration: none;
      }
        .product-container a, .product-cat{
            text-decoration: none;
            font-weight: 700;
            color: purple;
        }
        .product-container a:hover, .product-cat:hover{
            text-decoration: none;
            font-weight: 700;
            color: rgb(163, 84, 31);
        }
       </style>

       <style>
        input .form-control .r_search_box{
            font-size: 1rem !important;
            border-top-left-radius: 25px !important;
            border-bottom-left-radius: 25px !important;
            background-color: white;
        }
        .r_search_btn{
            font-size: 1rem;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            min-width: 55px;
            background-color: white;

        }
        .r_search_cat{
            font-size: 1rem;
            background-color: white;
        }

        .slick-slide{
            height: fit-content !important;
        }
        .cat-slide-img{
            width: 50px;
            height: 50px;
            display: flex;
            text-align: center;
        }
        .product-cat{
            display: flex !important;
            flex-direction: column;
            align-content: center;
            align-items: center;
            justify-content: center;
        }

        .product-cat-menu{
            text-decoration: none;
            font-weight: 700;
            color: purple;
        }
        .product-cat-menu:hover{
            text-decoration: none;
            font-weight: 700;
            color: rgb(163, 84, 31);
        }
        .product-container{
            padding: 5px;
            box-shadow: none;
            transition: 0.3s;
        }
        .product-container:hover{
            padding: 0px;
            box-shadow: 1px 1px 1px 1px rgb(155, 16, 16);
            transition: 0.3s;
        }
        /* .row{
            flex-wrap: nowrap;
        } */
    </style>
@stack('css')
  <script type="text/javascript">
         /*
  Add here your JavaScript Code.
  Note. the code entered here will be added in <head> tag


    Example:

    var x, y, z;
    x = 5;
    y = 6;
    z = x + y;

    */
    function Wo_Ajax_Requests_File(){
      return "{{env('HOME_URL')}}/requests.php"
    }
    function Wo_Ajax_Requests_Filee(){
      return "{{env('HOME_URL')}}/ajax_loading.php"
    }

    var websiteUrl = "{{env('HOME_URL')}}";
    $(function() {
      if (navigator.geolocation) {
        var location = navigator.geolocation.getCurrentPosition(Wo_UpdateLocation);
      }
      var box = $('#contnet');
      var ISAPI = $('#ISAPI').val();
      $(document).on('click', 'a[data-ajax]', function(e) {
        if ($('#live_post_id').length > 0) {
          DeleteLive();
          window.location = $(this).attr('href');
          return false;
        }
        Wo_CloseLightbox();
        $('body').removeAttr('no-more-posts');
        if ($('.postText').length) {
         if ($('.postText').val().length > 0) {
          if (!confirm("You haven't finished your post yet. Do you want to leave without finishing?")) {
           return false;
         } else {
           $('.postText').val("");
         }
       }
     }
     Wo_StartBar();
     window.post = 0;
     var url = $(this).attr('data-ajax');
     e.preventDefault();
     if (!ISAPI) {
       if (url == '?index.php?link1=home') {
        $get_value = $('#json-data').val();
        if ($get_value) {
          $('#load-more-posts').hide();
          json_data = JSON.parse($('#json-data').val());
          if (json_data.page == 'home') {
            document.getElementById('posts').innerHTML = '<div class="posts_load"><div class="wo_loading_post"><div class="lightui1-shimmer"> <div class="_2iwr"></div> <div class="_2iws"></div> <div class="_2iwt"></div> <div class="_2iwu"></div> <div class="_2iwv"></div> <div class="_2iww"></div> <div class="_2iwx"></div> <div class="_2iwy"></div> <div class="_2iwz"></div> <div class="_2iw-"></div> <div class="_2iw_"></div> <div class="_2ix0"></div> </div></div><div class="wo_loading_post"><div class="lightui1-shimmer"> <div class="_2iwr"></div> <div class="_2iws"></div> <div class="_2iwt"></div> <div class="_2iwu"></div> <div class="_2iwv"></div> <div class="_2iww"></div> <div class="_2iwx"></div> <div class="_2iwy"></div> <div class="_2iwz"></div> <div class="_2iw-"></div> <div class="_2iw_"></div> <div class="_2ix0"></div> </div></div></div>';
            loadposts();
            window.history.pushState({state:'new'},'', websiteUrl);
            $("html, body").animate({ scrollTop: 0 }, 100);
            $('.prc-user-details, .prc-pac-container, .lightbox-container').remove();
            Wo_clearPRecording();
            Wo_CleanRecordNodes();
            Wo_stopRecording();
            Wo_StopLocalStream();

            return false;
          }
        }
      }
      $.post(Wo_Ajax_Requests_Filee() + url, {url:url}, function (data) {
       $('.prc-user-details').remove();
       json_data = JSON.parse($(data).filter('#json-data').val());
       if (json_data.welcome_page == 1 || json_data.redirect == 1) {
         window.location.href = websiteUrl;
         return false;
       }
       if ($('.message-option-btns').length > 0) {
        if (json_data.url == 'index.php?index.php?link1=home') {
          window.location.href = websiteUrl;
        } else {
         window.location.href = json_data.url;
       }
       return false;
     }
                     //document.getElementById('#contnet').innerHTML = data;
                     box.html(data);
                     if (json_data.is_css_file == 1) {
                       $('.styled-profile').remove();
                       $('footer').append(json_data.css_file);
                       $('.extra-css').html(json_data.css_file_header);
                     } else {
                       $('.styled-profile').attr('href', '');
                       $('.extra-css').empty();
                     }
                     Wo_clearPRecording();
                     Wo_CleanRecordNodes();
                     Wo_stopRecording();
                     Wo_StopLocalStream();
                     if (json_data.page == 'home') {
                       $('.filterby li.filter-by-li').on('click', function (e) {
                         $('.filterby li.filter-by-li').each(function(){
                           $(this).removeClass('prc-active');
                           $(this).find('i').addClass('hidden');
                         });
                         $(this).find('i').removeClass('hidden');
                         $(this).addClass('prc-active');
                       });
                       window.history.pushState({state:'new'},'', websiteUrl);
                       //window.history.pushState({}, "{{env('HOME_URL')}}", websiteUrl);
                     } else {
                       window.history.pushState({state:'new'},'', json_data.url);
                       //window.history.pushState({}, "{{env('HOME_URL')}}", json_data.url);
                     }
                     $('.postText').autogrow({vertical: true, horizontal: false, height: 200});
                     window.onpopstate = function(event) {
                      $(window).unbind('popstate');
                      window.location.href = document.location;
                    };

                    if (json_data.page == 'timeline' || json_data.page == 'page' || json_data.page == 'group') {
                     $('.prc-content-container').css('margin-top', '25px');
                     $('.prc-ad-placement-header-footer').find('.contnet').css('margin-top', '20px');
                   } else {
                     $('.prc-content-container').css('margin-top', '45px');
                     $('.prc-ad-placement-header-footer').find('.contnet').css('margin-top', '0');
                   }
                   if (json_data.is_footer == 1 && $('.second-footer').css('display') == 'none') {
                    $('footer .footer-wrapper').show();
                  }
                  else if(json_data.is_footer == 1 && $('.second-footer').css('display') != 'none'){

                  } else {
                    if ($(window).width() < 720) {
                      $('footer .footer-wrapper').show();
                    } else {
                      $('footer .footer-wrapper, .second-footer').hide();
                    }
                  }
                  document.title = decodeHtml(json_data.title);
                  document_title = decodeHtml(json_data.title);
                  $("html, body").animate({ scrollTop: 0 }, 150);
                  Wo_FinishBar();
                  $('#hidden-content').empty();
                  $(document).ready(function() {$('div.prc-leftcol').theiaStickySidebar({additionalMarginTop: 65});});
                  $('#users-reacted-modal').modal("hide");
                });
      $('.prc-user-details, .prc-pac-container, .lightbox-container').remove();
    }
  });
  });
  function RunLiveAgora(channelName,DIV_ID,token) {
    var agoraAppId = '38c70ba43e90470f84340cb5f51aadff';
    var token = token;

    var client = AgoraRTC.createClient({mode: 'live', codec: 'vp8'});
    client.init(agoraAppId, function () {


      client.setClientRole('audience', function() {
      }, function(e) {
      });

      client.join(token, channelName, 115256, function(uid) {
      }, function(err) {
      });
    }, function (err) {
    });

    client.on('stream-added', function (evt) {
      var stream = evt.stream;
      var streamId = stream.getId();

      client.subscribe(stream, function (err) {
      });
    });
    client.on('stream-subscribed', function (evt) {
      var remoteStream = evt.stream;
      remoteStream.play(DIV_ID);
      $('#player_'+remoteStream.getId()).addClass('embed-responsive-item');
    });
  }
  </script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-160446042-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-160446042-1');
  </script>



  <style>
  @font-face {
    font-family: OpenSansLight;
    src: url("{{env('HOME_URL')}}/themes/wowonder/fonts/OpenSansLight/OpenSansLight.woff") format("woff");
    font-weight: normal;
  }
  @font-face {
    font-family: OpenSansRegular;
    src: url("{{env('HOME_URL')}}/themes/wowonder/fonts/OpenSansRegular/OpenSansRegular.woff") format("woff");
    font-weight: normal;
  }
  @font-face {
    font-family: OpenSansSemiBold;
    src: url("{{env('HOME_URL')}}/themes/wowonder/fonts/OpenSansSemiBold/OpenSansSemiBold.woff") format("woff");
    font-weight: normal;
  }
  @font-face {
    font-family: OpenSansBold;
    src: url("{{env('HOME_URL')}}/themes/wowonder/fonts/OpenSansBold/OpenSansBold.woff") format("woff");
    font-weight: normal;
  }
  .prc-navbar-default {
    background: #ffffff; border: none;
    height: 46px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
  }
  .round-check input[type="checkbox"]:checked + label:before {
    background: #0000ff !important;
  }
  .group-messages-wrapper a{
    color: #0000ff !important;
  }
  ul.profile-completion-bar li.completion-bar div.completion-bar-status {
    background: #0000ff !important;
  }
  .featured-users{
    background: #fff !important;
  }
  .result-bar {
    background: #0000ff !important;
  }
  .featured-users .sidebar-title-back, .featured-users .pro-me-here a {
    color: #444 !important;
  }

  .prc-active {
    border-color: #0000ff !important;
  }
  .prc-barloading {
    background-color: transparent !important;
  }
  .prc-barloading:before {
    background-color: #8dd9ff;
  }
  .prc-left-sidebar ul li a i {
    color: #0000ff !important;
  }
  .cs-loader-inner, .main  {
    color: #0000ff;
  }
  .login input:focus, ul.profile-completion-bar li.completion-bar div.completion-bar-wrapper, .edit_grp_info_modal input.prc-form-control:not(textarea):focus, .verfy_sett_email_phone input.prc-form-control:not(textarea):focus {
    border-color: #0000ff !important;
  }
  .login:not(.loading) button:hover {
    background: #000000 !important;
    color: #ffffff;
  }
  .wo_setting_sidebar ul .prc-list-group-item{
    background: #0000ff !important;
  }
  .wo_setting_sidebar ul .prc-list-group-item a{
    color: #ffffff;
  }
  .wo_settings_page .setting-panel input[type=text]:focus, .wo_settings_page .setting-panel input[type=email]:focus, .wo_settings_page .setting-panel input[type=password]:focus, .wo_settings_page .setting-panel select:focus, .wo_settings_page .setting-panel textarea:focus {
    border-color: #03A9F4;
  }

  #search-nearby-users .nearby-users-relationship-collapse li.active .friends_toggle{
    border-color: #0000ff;
  }
  #search-nearby-users .nearby-users-relationship-collapse li.active .friends_toggle:after{
    background: #0000ff;
  }
  .wo_page_hdng_menu > ul li.active a {
    box-shadow: inset 0px -2.5px #0000ff;
  }
  .login button, .postCategory h5, .wo_search_page .nav-tabs li.active a {
    background: #0000ff !important;
    color: #ffffff !important;
  }
  .mejs-controls .mejs-time-rail .mejs-time-current, .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current, .mejs-controls .mejs-volume-button .mejs-volume-slider .mejs-volume-current {
    background-color: #0000ff !important;
    background: #0000ff !important;
    background-image: #0000ff !important;
  }
  .prc-navbar-default .prc-navbar-nav>.open>a, .prc-navbar-default .prc-navbar-nav>.open>a:focus, .prc-navbar-default .prc-navbar-nav>.open>a:hover {
    color: #ffffff !important;
    background-color: #333333 !important;
  }
  .prc-navbar-default .prc-navbar-nav>.active>a, .prc-navbar-default .prc-navbar-nav>.active>a:focus, .prc-navbar-default .prc-navbar-nav>.active>a:hover, .nav-names li:hover {
    color: #ffffff !important;
    background-color: #333333 !important;
  }
  body {
    background-color: #f9f9f9;
  }
  .prc-navbar-default .prc-navbar-nav>li>a {
    color: #ffffff;
    font-size: 13px;
  }
  a.unread-update {
    color: #ffffff !important;
  }
  .btn-main {
    color: #ffffff;
    background-color: #0000ff;
    border-color: #0000ff;
  }
  .btn-main:hover {
    color: #0000ff;
    background-color: #000000;
    border-color: #000000;
  }
  .btn-main:focus {
    color: #0000ff;
  }
  .active-wonder {
    color: #0000ff;
  }
  .admin-panel .prc-col-md-9 .prc-list-group-item:first-child, .setting-panel .prc-col-md-8 .prc-list-group-item:first-child, .profile-lists .prc-list-group-item:first-child, .prc-col-md-8 .prc-list-group-item:first-child, .prc-col-md-3.custom .prc-list-group-item:first-child, .prc-col-sm-4 .prc-list-group-item:first-child, .prc-col-md-7 .prc-list-group-item:first-child, .prc-col-md-9 .prc-list-group-item:first-child, .red-list .prc-list-group-item:first-child, .active.prc-list-group-item:first-child {
   color: #444;
   background-color: #fcfcfc;
   border-bottom: 1px solid #f1f1f1;
   padding: 18px;
  }
  .admin-panel .prc-col-md-9 .prc-list-group-item:first-child a, .setting-panel .prc-col-md-8 .prc-list-group-item:first-child a, .profile-lists .prc-list-group-item:first-child a, .prc-col-md-8 .prc-list-group-item:first-child a, .prc-col-md-7 .prc-list-group-item:first-child a, .active.prc-list-group-item:first-child a {
    color: #444 !important;
  }
  .prc-list-group-item.black-list.active-list, .red-list.active-list {
    color: #ffffff;
    background-color: #0000ff;
  }
  .prc-list-group-item.black-list {
    background: #0000ff;
  }
  .profile-top-line {
    background-color: #0000ff;
  }
  #bar {
    background-color: #0000ff;
  }
  .prc-list-group-item.black-list a{
    color: #ffffff;
  }
  .prc-list-group-item.black-list.active-list a{
    color: #0000ff;
  }
  .main-color, .small-text a {
    color: #0000ff !important;
  }
  .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #ffffff;
    cursor: default;
    color: #0000ff;
    border-bottom: 1px solid #0000ff;
    background-color: transparent
  }
  .btn-active {
    color: #ffffff;
    background: #0000ff;
    outline: none;
    border: 1px solid #0000ff}
    .btn-active:hover, .btn-active:focus {
      border: 1px solid #000000;
      color: #0000ff;
      background: #000000;
    }
    .btn-active-color:hover {
      background: #000000;
    }
    .chat-tab .online-toggle-hdr, .wow_thread_head {
      background: #ffffff;
      color: #ffffff;
    }
    .chat-tab .online-toggle-hdr a {
      color: #ffffff;
    }
    .profile-style .user-follow-button button.btn-active, .btn-login, .btn-register {
      background: #0000ff;
      color: #ffffff;
    }
    .profile-style .user-follow-button button.btn-active:hover, .btn-login:hover, .btn-login:focus, .btn-register:hover, .btn-register:focus {
      color: #0000ff;
      background: #000000;
    }
    .panel-login>.panel-heading a.active {
      color: #0000ff;
      font-size: 18px;
    }
    .hash {
      color: #0000ff;
    }
    .message-text .hash {
      color: #fff !important;
    }
    .prc-search-container .prc-search-input {
      color: #ffffff !important;
      background: #0f1110 !important;
    }
    .chat-messages-wrapper .outgoing .message-text {
      background: #0000ff;
      color: #ffffff;
    }
    .normal-container {
      width: 100%;
      height: 100%;
      margin-top: 15px;
    }
    .active.fa-thumbs-up {
      color: #0000ff;
    }
    .api-ex-urls {
      background-color: #0000ff; color: #ffffff;
    }
    .user-username {
      color: #0000ff;
    }
    .upload-image {
      border: 3px dashed #0000ff;
    }
    .events-tab-list li { background-color: #0000ff; }
    .events-tab-list li:hover { background-color: #0000ff; }
    .active-e-tab { background-color: #0000ff !important; }
    .main { color: #0000ff !important; }
    .events-list-dropup-menu ul li a:hover { background: #0000ff; }
    .usr-offline { color: #0000ff; }
    .blog-dd-ul li span:hover, .blog-dd-ul li a:hover { background: #0000ff !important; }
    .blog_publ {background: #0000ff ; border: 1px solid #0000ff ; }
    .slide-film-desc:hover, .movies-top-breadcrumb li:hover, .movies-top-breadcrumb li a:hover{
      color: #0000ff !important;
    }
    .movies h3.latest-movies, h3.recommended-movies {
      border-left: 3px solid  #0000ff;
    }

    .wo_user_profile .user-bottom-nav li .menuactive {
      border-bottom: 2px solid #0000ff;
      color:#0000ff;
    }
    .ads-navbar-wrapper ul li a.active {
      border-color: #0000ff;
    }
    .ads_mini_wallet, .wo_page_hdng_innr span {
      background-color: #0000ff;
      color: #ffffff;
    }
    .btn-loading:after {
      background-color: #0000ff;
    }
    .wow_pub_privacy_menu li label input[type="radio"]:checked+span {
      background-color: #0000ff;color: #ffffff;
    }
    .order_by ul li.active a {background: #0000ff !important;color: #ffffff !important;}


    body, .prc-navbar-default, .wo_about_wrapper_parent{padding-right: 250px;}
    .wow_main_float_head {right: 250px;}
    @media (max-width:1140px){
      .wo_about_wrapper_parent{padding-right: 0px;}
      .wow_main_float_head {right: 0;}
    }


    #welcomeheader .mdbtn:hover{background-color: #ffffff;color: #ffffff;border-color: #ffffff;}

    .post .panel.active_shadow {
      box-shadow: 0 0 0 1.5px #0000ff !important;
    }

    .ui-widget-header .ui-state-default, .wo_adv_search_filter_side .ui-slider .ui-slider-range, .wo_adv_search_filter_side .ui-slider .ui-slider-handle {
      background-color: #0000ff;
    }
    .reaction-1::before {
      content: "Like";
    }
    .reaction-2::before {
      content: "Love";
    }
    .reaction-3::before {
      content: "HaHa";
    }
    .reaction-4::before {
      content: "WoW";
    }
    .reaction-5::before {
      content: "Sad";
    }
    .reaction-6::before {
      content: "Angry";
    }
  /*.reaction-like::before {
    content: "Like";
  }
  .reaction-love::before {
    content: "Love";
  }
  .reaction-haha::before {
    content: "HaHa";
  }
  .reaction-wow::before {
    content: "WoW";
  }
  .reaction-sad::before {
    content: "Sad";
  }
  .reaction-angry::before {
    content: "Angry";
    }*/

    .prc-navbar-default .dropdown-menu.prc-ani-acc-menu >li>a:hover {
      color: #ffffff;background-color: #0000ff;
    }
    #wo_nw_msg_page .msg_under_hood .mobilerightpane .messages-search-users-form .wo_msg_tabs li.active a, .text-sender-container .msg_usr_info_top_list .msg_usr_cht_opts_btns > span:hover, .text-sender-container .msg_usr_info_top_list .msg_usr_cht_usr_data a:hover, .wo_chat_tabs li.active a {
      color: #0000ff;
    }
    .text-sender-container .outgoing .message-model .message {background-color: #0000ff;color: #ffffff;}
    .text-sender-container .outgoing .message-model .message p, .text-sender-container .outgoing .message-model .message a {color: #ffffff;}

    #notification-popup {
     position: fixed;
     left: 20px;
     width: 300px;
     bottom: 20px;
     z-index: 10000;
   }
   #notification-popup .notifications-popup-list:empty {
    padding: 0;
  }
  #notification-popup .notifications-popup-list {
    position: relative;
    background:  #333333 !important;
    border-radius: 10px;
    padding: 6px;
    width: 100%;
    margin-bottom: 10px;
    z-index: 10000;
    box-shadow: 0 2px 4px rgb(0 0 0 / 10%);
  }
  #notification-popup .notifications-popup-list, #notification-popup .notifications-popup-list a, #notification-popup .notifications-popup-list .main-color, #notification-popup .notifications-popup-list svg, #notification-popup .notifications-popup-list .notification-text, #notification-popup .notifications-popup-list .notification-time {
    color: #ffffff !important;
  }
  #notification-popup .notifications-popup-list .notification-list {
    border-radius: 10px;
  }
  #notification-popup .notifications-popup-list .notification-list:hover {
    background: rgba(255, 255, 255, 0.1);
  }
  </style>

  <script src="{{env('HOME_URL')}}/themes/wowonder/javascript/agora.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
  <script crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

  <script src="{{env('HOME_URL')}}/themes/wowonder/javascript/socket.io.js"></script>
  <script>
    let nodejs_system = "0";
    let socket = null
    let groupChatListener = {}
    $(()=>{
    });
  </script>

  <style type="text/css" data-fbcssmodules="css:fb.css.base css:fb.css.dialog css:fb.css.iframewidget css:fb.css.customer_chat_plugin_iframe">.fb_hidden{position:absolute;top:-10000px;z-index:10001}.fb_reposition{overflow:hidden;position:relative}.fb_invisible{display:none}.fb_reset{background:none;border:0;border-spacing:0;color:#000;cursor:auto;direction:ltr;font-family:"lucida grande", tahoma, verdana, arial, sans-serif;font-size:11px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:1;margin:0;overflow:visible;padding:0;text-align:left;text-decoration:none;text-indent:0;text-shadow:none;text-transform:none;visibility:visible;white-space:normal;word-spacing:normal}.fb_reset>div{overflow:hidden}@keyframes fb_transform{from{opacity:0;transform:scale(.95)}to{opacity:1;transform:scale(1)}}.fb_animate{animation:fb_transform .3s forwards}
  .fb_dialog{background:rgba(82, 82, 82, .7);position:absolute;top:-10000px;z-index:10001}.fb_dialog_advanced{border-radius:8px;padding:10px}.fb_dialog_content{background:#fff;color:#373737}.fb_dialog_close_icon{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;cursor:pointer;display:block;height:15px;position:absolute;right:18px;top:17px;width:15px}.fb_dialog_mobile .fb_dialog_close_icon{left:5px;right:auto;top:5px}.fb_dialog_padding{background-color:transparent;position:absolute;width:1px;z-index:-1}.fb_dialog_close_icon:hover{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent}.fb_dialog_close_icon:active{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent}.fb_dialog_iframe{line-height:0}.fb_dialog_content .dialog_title{background:#6d84b4;border:1px solid #365899;color:#fff;font-size:14px;font-weight:bold;margin:0}.fb_dialog_content .dialog_title>span{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;float:left;padding:5px 0 7px 26px}body.fb_hidden{height:100%;left:0;margin:0;overflow:visible;position:absolute;top:-10000px;transform:none;width:100%}.fb_dialog.fb_dialog_mobile.loading{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;min-height:100%;min-width:100%;overflow:hidden;position:absolute;top:0;z-index:10001}.fb_dialog.fb_dialog_mobile.loading.centered{background:none;height:auto;min-height:initial;min-width:initial;width:auto}.fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner{width:100%}.fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content{background:none}.loading.centered #fb_dialog_loader_close{clear:both;color:#fff;display:block;font-size:18px;padding-top:20px}#fb-root #fb_dialog_ipad_overlay{background:rgba(0, 0, 0, .4);bottom:0;left:0;min-height:100%;position:absolute;right:0;top:0;width:100%;z-index:10000}#fb-root #fb_dialog_ipad_overlay.hidden{display:none}.fb_dialog.fb_dialog_mobile.loading iframe{visibility:hidden}.fb_dialog_mobile .fb_dialog_iframe{position:sticky;top:0}.fb_dialog_content .dialog_header{background:linear-gradient(from(#738aba), to(#2c4987));border-bottom:1px solid;border-color:#043b87;box-shadow:white 0 1px 1px -1px inset;color:#fff;font:bold 14px Helvetica, sans-serif;text-overflow:ellipsis;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0;vertical-align:middle;white-space:nowrap}.fb_dialog_content .dialog_header table{height:43px;width:100%}.fb_dialog_content .dialog_header td.header_left{font-size:12px;padding-left:5px;vertical-align:middle;width:60px}.fb_dialog_content .dialog_header td.header_right{font-size:12px;padding-right:5px;vertical-align:middle;width:60px}.fb_dialog_content .touchable_button{background:linear-gradient(from(#4267B2), to(#2a4887));background-clip:padding-box;border:1px solid #29487d;border-radius:3px;display:inline-block;line-height:18px;margin-top:3px;max-width:85px;padding:4px 12px;position:relative}.fb_dialog_content .dialog_header .touchable_button input{background:none;border:none;color:#fff;font:bold 12px Helvetica, sans-serif;margin:2px -12px;padding:2px 6px 3px 6px;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog_content .dialog_header .header_center{color:#fff;font-size:16px;font-weight:bold;line-height:18px;text-align:center;vertical-align:middle}.fb_dialog_content .dialog_content{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;border:1px solid #4a4a4a;border-bottom:0;border-top:0;height:150px}.fb_dialog_content .dialog_footer{background:#f5f6f7;border:1px solid #4a4a4a;border-top-color:#ccc;height:40px}#fb_dialog_loader_close{float:left}.fb_dialog.fb_dialog_mobile .fb_dialog_close_icon{visibility:hidden}#fb_dialog_loader_spinner{animation:rotateSpinner 1.2s linear infinite;background-color:transparent;background-image:url(https://static.xx.fbcdn.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);background-position:50% 50%;background-repeat:no-repeat;height:24px;width:24px}@keyframes rotateSpinner{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}
  .fb_iframe_widget{display:inline-block;position:relative}.fb_iframe_widget span{display:inline-block;position:relative;text-align:justify}.fb_iframe_widget iframe{position:absolute}.fb_iframe_widget_fluid_desktop,.fb_iframe_widget_fluid_desktop span,.fb_iframe_widget_fluid_desktop iframe{max-width:100%}.fb_iframe_widget_fluid_desktop iframe{min-width:220px;position:relative}.fb_iframe_widget_lift{z-index:1}.fb_iframe_widget_fluid{display:inline}.fb_iframe_widget_fluid span{width:100%}
  .fb_mpn_mobile_landing_page_slide_out{animation-duration:200ms;animation-name:fb_mpn_landing_page_slide_out;transition-timing-function:ease-in}.fb_mpn_mobile_landing_page_slide_out_from_left{animation-duration:200ms;animation-name:fb_mpn_landing_page_slide_out_from_left;transition-timing-function:ease-in}.fb_mpn_mobile_landing_page_slide_up{animation-duration:500ms;animation-name:fb_mpn_landing_page_slide_up;transition-timing-function:ease-in}.fb_mpn_mobile_bounce_in{animation-duration:300ms;animation-name:fb_mpn_bounce_in;transition-timing-function:ease-in}.fb_mpn_mobile_bounce_out{animation-duration:300ms;animation-name:fb_mpn_bounce_out;transition-timing-function:ease-in}.fb_mpn_mobile_bounce_out_v2{animation-duration:300ms;animation-name:fb_mpn_fade_out;transition-timing-function:ease-in}.fb_customer_chat_bounce_in_v2{animation-duration:300ms;animation-name:fb_bounce_in_v2;transition-timing-function:ease-in}.fb_customer_chat_bounce_in_from_left{animation-duration:300ms;animation-name:fb_bounce_in_from_left;transition-timing-function:ease-in}.fb_customer_chat_bounce_out_v2{animation-duration:300ms;animation-name:fb_bounce_out_v2;transition-timing-function:ease-in}.fb_customer_chat_bounce_out_from_left{animation-duration:300ms;animation-name:fb_bounce_out_from_left;transition-timing-function:ease-in}.fb_invisible_flow{display:inherit;height:0;overflow-x:hidden;width:0}@keyframes fb_mpn_landing_page_slide_out{0%{margin:0 12px;width:100% - 24px}60%{border-radius:18px}100%{border-radius:50%;margin:0 24px;width:60px}}@keyframes fb_mpn_landing_page_slide_out_from_left{0%{left:12px;width:100% - 24px}60%{border-radius:18px}100%{border-radius:50%;left:12px;width:60px}}@keyframes fb_mpn_landing_page_slide_up{0%{bottom:0;opacity:0}100%{bottom:24px;opacity:1}}@keyframes fb_mpn_bounce_in{0%{opacity:.5;top:100%}100%{opacity:1;top:0}}@keyframes fb_mpn_fade_out{0%{bottom:30px;opacity:1}100%{bottom:0;opacity:0}}@keyframes fb_mpn_bounce_out{0%{opacity:1;top:0}100%{opacity:.5;top:100%}}@keyframes fb_bounce_in_v2{0%{opacity:0;transform:scale(0, 0);transform-origin:bottom right}50%{transform:scale(1.03, 1.03);transform-origin:bottom right}100%{opacity:1;transform:scale(1, 1);transform-origin:bottom right}}@keyframes fb_bounce_in_from_left{0%{opacity:0;transform:scale(0, 0);transform-origin:bottom left}50%{transform:scale(1.03, 1.03);transform-origin:bottom left}100%{opacity:1;transform:scale(1, 1);transform-origin:bottom left}}@keyframes fb_bounce_out_v2{0%{opacity:1;transform:scale(1, 1);transform-origin:bottom right}100%{opacity:0;transform:scale(0, 0);transform-origin:bottom right}}@keyframes fb_bounce_out_from_left{0%{opacity:1;transform:scale(1, 1);transform-origin:bottom left}100%{opacity:0;transform:scale(0, 0);transform-origin:bottom left}}@keyframes slideInFromBottom{0%{opacity:.1;transform:translateY(100%)}100%{opacity:1;transform:translateY(0)}}@keyframes slideInFromBottomDelay{0%{opacity:0;transform:translateY(100%)}97%{opacity:0;transform:translateY(100%)}100%{opacity:1;transform:translateY(0)}}</style><style id="theia-sticky-sidebar-stylesheet-TSS">.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style><style></style><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/46/6/common.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/46/6/util.js"></script></head>

  <body style="transform: none;" data-new-gr-c-s-check-loaded="14.1029.0" data-gr-ext-installed=""><div role="dialog" aria-live="polite" aria-label="cookieconsent" aria-describedby="cookieconsent:desc" class="cc-window cc-banner cc-type-info cc-theme-edgeless cc-bottom cc-color-override--1505123418 cc-invisible" style="display: none;"><!--googleoff: all--><span id="cookieconsent:desc" class="cc-message">This website uses cookies to ensure you get the best experience on our website. <a aria-label="learn more about cookies" role="button" tabindex="0" class="cc-link" href="{{env('HOME_URL')}}/terms/privacy-policy" target="_blank">Learn More</a></span><div class="cc-compliance"><a aria-label="dismiss cookie message" role="button" tabindex="0" class="cc-btn cc-dismiss">Got It!</a></div><!--googleon: all--></div>
    <input type="hidden" id="get_no_posts_name" value="No more posts">
    <div id="focus-overlay"></div>
    <input type="hidden" class="seen_stories_users_ids" value="">
    <input type="hidden" class="main_session" value="83c3e5925aed194ee24c">
    <header class="prc-header-container">
      <style>
      body {
        font-family: "Lato", sans-serif;
      }

      .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 99999;
        top: 0;
        left: 0;
        background-color: #fff;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 5px;
      }

      .main_menu{
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 14px;
        color: #000;
        display: block;
        transition: 0.3s;
      }


      .main_menu:hover {
        color: #199ce8;
      }

      .sidenav .closebtn {
        position: absolute;
        color:  black;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
      }

      @media    screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
      }

      @media    screen and (min-width: 991px) {
        .prc-burger_menu{display: none;}
      }


      @media    screen and (max-width: 990px) {
        .prc-burger_menu{display: block;}
      }
    </style>

    <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }
    </script>

    <div id="mySidenav" class="sidenav">
      <a class="main_menu pull-right" style="font-size:30px" href="javascript:void(0)" onclick="closeNav()">×</a>
      <br><br>

      <form style="width:95%; margin: 0px 5px 0px 5px;" data-toggle="dropdown" role="button" id="">
        <div class="prc-form-group prc-inner-addon prc-left-addon ">

          <input type="text" class="prc-form-control prc-search-input" onkeyup="Wo_DetectSearchType(this.value), document.getElementById('wo_repeat_search').innerHTML = escapeHtml(this.value)" placeholder="Search for people, pages, Friends Clubs and #hashtags" dir="auto" onfocus="Wo_GetRecentSearchs()">
        </div>
      </form>

      <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}" data-ajax="?index.php?link1=home">
        <img src="{{env('HOME_URL')}}/icons/home.png" width="25px"> News Feed  </a>

        <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/admin" data-ajax="?link1=timeline&amp;u=admin">
          <img src="{{env('HOME_URL')}}/icons/tag-friend.png" width="25px"> My Profile    </a>

          <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/messages" data-ajax="?link1=messages">
            <img src="{{env('HOME_URL')}}/icons/messenger.png" width="25px"> Chat
          </a>

          <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/pages" data-ajax="?link1=pages">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f79f58" d="M14.4,6L14,4H5V21H7V14H12.6L13,16H20V6H14.4Z"></path></svg> Pages    </a>

            <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/groups" data-ajax="?link1=groups">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#03A9F4" d="M5 3A2 2 0 0 0 3 5H5M7 3V5H9V3M11 3V5H13V3M15 3V5H17V3M19 3V5H21A2 2 0 0 0 19 3M3 7V9H5V7M7 7V11H11V7M13 7V11H17V7M19 7V9H21V7M3 11V13H5V11M19 11V13H21V11M7 13V17H11V13M13 13V17H17V13M3 15V17H5V15M19 15V17H21V15M3 19A2 2 0 0 0 5 21V19M7 19V21H9V19M11 19V21H13V19M15 19V21H17V19M19 19V21A2 2 0 0 0 21 19Z"></path></svg> Friends Clubs    </a>

              <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/friends-nearby/" data-ajax="?link1=friends-nearby">
                <img src="{{env('HOME_URL')}}/icons/friends.png" width="25px"> People You May Know
              </a>

              <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/blogs">
                <img src="{{env('HOME_URL')}}/icons/blog.png" width="25px"> Blog    </a>
                <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/videos">
                  <img src="{{env('HOME_URL')}}/icons/movies.png" width="25px"> Videos
                </a>
                <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/albums" data-ajax="?link1=albums">
                  <img src="{{env('HOME_URL')}}/icons/gallery.png" width="25px"> Albums    </a>

                  <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/videos">
                    <img src="{{env('HOME_URL')}}/icons/movies.png" width="25px"> Videos


                  </a><a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/new-game" data-ajax="?link1=new-game">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#03A9F4" d="M16.5,9L13.5,12L16.5,15H22V9M9,16.5V22H15V16.5L12,13.5M7.5,9H2V15H7.5L10.5,12M15,7.5V2H9V7.5L12,10.5L15,7.5Z"></path></svg> Games    </a>

                    <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/jobs" data-ajax="?link1=jobs">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4caf50" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z"></path></svg> Jobs    </a>

                      <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/poke" data-ajax="?link1=poke">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#009688" d="M21,9A1,1 0 0,1 22,10A1,1 0 0,1 21,11H16.53L16.4,12.21L14.2,17.15C14,17.65 13.47,18 12.86,18H8.5C7.7,18 7,17.27 7,16.5V10C7,9.61 7.16,9.26 7.43,9L11.63,4.1L12.4,4.84C12.6,5.03 12.72,5.29 12.72,5.58L12.69,5.8L11,9H21M2,18V10H5V18H2Z"></path></svg> Pokes    </a>

                        <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/most_liked" data-ajax="?link1=most_liked">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8d73cc" d="M20 22H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1zm-1-2V4H5v16h14zM7 6h4v4H7V6zm0 6h10v2H7v-2zm0 4h10v2H7v-2zm6-9h4v2h-4V7z"></path></svg> Popular Posts
                        </a>


                        <hr>

                        <div style="padding: 10px;">
                          <a onclick="closeNav()" style="color:#1da1f2;" data-ajax="?link1=terms&amp;type=terms" href="{{env('HOME_URL')}}/terms/terms">Terms of Use</a>
                          <a onclick="closeNav()" style="color:#1da1f2;" data-ajax="?link1=terms&amp;type=privacy-policy" href="{{env('HOME_URL')}}/terms/privacy-policy">Privacy Policy</a>
                          <a onclick="closeNav()" style="color:#1da1f2;" data-ajax="?link1=contact-us" href="{{env('HOME_URL')}}/contact-us">Contact</a>
                          <a onclick="closeNav()" style="color:#1da1f2;" data-ajax="?link1=terms&amp;type=about-us" href="{{env('HOME_URL')}}/terms/about-us">About</a>
                          <a onclick="closeNav()" style="color:#1da1f2;" data-ajax="?link1=developers" href="{{env('HOME_URL')}}/developers">Developers</a>

                        </div>
                        <p style="color: black;">
                          <b>© 2021 Payrchat</b>

                          All Rights Reserved
                        </p>

                      </div>

                      <div class="prc-navbar prc-navbar-default prc-navbar-fixed-top">
                        <nav class="prc-header-fixed1000">
                          <div class="prc-container-fluid">
                           <div class="prc-wow_hdr_innr_left">


                            <span class="prc-burger_menu" style="font-size:30px;cursor:pointer; color: black" onclick="openNav()">☰ </span>  

                            <a class="prc-brand prc-header-brand" href="{{env('HOME_URL')}}">
                             <img width="130" src="{{env('HOME_URL')}}/themes/wowonder/img/logo.png" alt="Payrchat Logo">
                           </a>
                           <ul class="prc-nav prc-navbar-nav">
                            <li>
                             <a class="prc-sixteen-font-size" href="{{env('HOME_URL')}}" data-ajax="?index.php?link1=home">
                              <img src="{{env('HOME_URL')}}/icons/home.png" width="20px">
                            </a>
                          </li>
  <!-- 													<li class="dropdown head_name_links">
                                <a href="#" class="dropdown-toggle prc-sixteen-font-size btn-main" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M11 11V7h2v4h4v2h-4v4h-2v-4H7v-2h4zm1 11C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z" fill="currentColor"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="hide_fill_svg"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-11H7v2h4v4h2v-4h4v-2h-4V7h-2v4z" fill="currentColor"/></svg>
                                </a>
                                <ul class="dropdown-menu clearfix create_head_menu toleft" role="menu">
                                                                        <li>
                                        <a href="{{env('HOME_URL')}}/ads/create/"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#9c27b0" d="M12,8H4A2,2 0 0,0 2,10V14A2,2 0 0,0 4,16H5V20A1,1 0 0,0 6,21H8A1,1 0 0,0 9,20V16H12L17,20V4L12,8M21.5,12C21.5,13.71 20.54,15.26 19,16V8C20.53,8.75 21.5,10.3 21.5,12Z" /></svg> Create Ad</a>
                                    </li>
                                                                                                            <li>
                                        <a href="{{env('HOME_URL')}}/create-blog/"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#009da0" d="M18,20H6V18H4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V18H18V20M14,2H6A2,2 0 0,0 4,4V12H6V4H14V8H18V12H20V8L14,2M11,16H8V14H11V16M16,16H13V14H16V16M3,14H6V16H3V14M21,16H18V14H21V16Z" /></svg> Create Blog</a>
                                    </li>
                                                                                                            <li>
                                        <a href="{{env('HOME_URL')}}/events/create-event/"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f25e4e" d="M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z" /></svg> Create Event</a>
                                    </li>
                                                                                                            <li>
                                        <a href="{{env('HOME_URL')}}/create-group" data-ajax="?link1=create-group"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#03A9F4" d="M12,6A3,3 0 0,0 9,9A3,3 0 0,0 12,12A3,3 0 0,0 15,9A3,3 0 0,0 12,6M6,8.17A2.5,2.5 0 0,0 3.5,10.67A2.5,2.5 0 0,0 6,13.17C6.88,13.17 7.65,12.71 8.09,12.03C7.42,11.18 7,10.15 7,9C7,8.8 7,8.6 7.04,8.4C6.72,8.25 6.37,8.17 6,8.17M18,8.17C17.63,8.17 17.28,8.25 16.96,8.4C17,8.6 17,8.8 17,9C17,10.15 16.58,11.18 15.91,12.03C16.35,12.71 17.12,13.17 18,13.17A2.5,2.5 0 0,0 20.5,10.67A2.5,2.5 0 0,0 18,8.17M12,14C10,14 6,15 6,17V19H18V17C18,15 14,14 12,14M4.67,14.97C3,15.26 1,16.04 1,17.33V19H4V17C4,16.22 4.29,15.53 4.67,14.97M19.33,14.97C19.71,15.53 20,16.22 20,17V19H23V17.33C23,16.04 21,15.26 19.33,14.97Z" /></svg> Create Friends Club</a>
                                    </li>
                                                                                                            <li>
                                        <a href="{{env('HOME_URL')}}/create-page" data-ajax="?link1=create-page"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f79f58" d="M14.4,6L14,4H5V21H7V14H12.6L13,16H20V6H14.4Z" /></svg> Create Page</a>
                                    </li>
                                                                    </ul>
                            </li>
                          -->
                        </ul>
                      </div>
                      <ul class="nav prc-navbar-nav">
                        <li class="dropdown prc-search-container">
                          <form class="prc-navbar-form prc-navbar-left prc-col-lg-12 prc-form-group" data-toggle="dropdown" role="button" id="navbar-searchbox">
                            <div class="prc-form-group prc-inner-addon prc-left-addon ">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="prc-feather main-color prc-feather-search glyphicon"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                              <input type="text" class="prc-form-control prc-search-input" onkeyup="Wo_DetectSearchType(this.value), document.getElementById('wo_repeat_search').innerHTML = escapeHtml(this.value)" placeholder="Search for people, pages, Friends Clubs and #hashtags" dir="auto" onfocus="Wo_GetRecentSearchs()">
                            </div>
                          </form>
                          <ul class="dropdown-menu prc-search-dropdown-container" style="margin-left:7px;" role="menu">
                            <div class="prc-search-dropdown-result">
                              <li>
                                <a href="{{env('HOME_URL')}}/Testdemo?ref=se" data-ajax="?link1=timeline&amp;u=Testdemo&amp;ref=se">
                                  <span class="prc-user-popover" data-id="4" data-type="user">
                                    <div class="prc-search-user-avatar pull-left">
                                      <img src="{{env('HOME_URL')}}/upload/photos/d-avatar.jpg?cache=0" alt="test user1 Profile Picture">
                                    </div>
                                    <span class="prc-search-user-name">
                                      test user1

                                      <span class="verified-color"><i class="fa fa-check-circle" title="Verified User"></i></span>
                                    </span>
                                  </span>
                                  <div class="prc-user-lastseen">
                                    <span class="prc-small-last-seen">6 w</span>		</div>
                                  </a>
                                  <div class="clear"></div>
                                </li>
                                <li>
                                  <a href="{{env('HOME_URL')}}/mdrohim034?ref=se" data-ajax="?link1=timeline&amp;u=mdrohim034&amp;ref=se">
                                    <span class="prc-user-popover" data-id="8915" data-type="user">
                                      <div class="prc-search-user-avatar pull-left">
                                        <img src="{{env('HOME_URL')}}/upload/photos/2021/08/dpeHQcCRS3lBoSsub2N3_20_7ff7fbd8de6db02692aea42abe1ec0a6_avatar.jpeg?cache=0" alt="Payrchat Simu Profile Picture">
                                      </div>
                                      <span class="prc-search-user-name">
                                        Payrchat Simu

                                        <span class="prc-verified-color"><i class="fa fa-check-circle" title="Verified User"></i></span>
                                      </span>
                                    </span>
                                    <div class="prc-user-lastseen">
                                      <span class="prc-small-last-seen">4 w</span>		</div>
                                    </a>
                                    <div class="clear"></div>
                                  </li>
                                  <li>
                                    <a href="{{env('HOME_URL')}}/timeline&amp;u=test18@user.com_8957?ref=se" data-ajax="?link1=timeline&amp;u=test18@user.com_8957&amp;ref=se">
                                      <span class="prc-user-popover" data-id="8957" data-type="user">
                                        <div class="prc-search-user-avatar pull-left">
                                          <img src="{{env('HOME_URL')}}/upload/photos/d-avatar.jpg?cache=0" alt="Test User18 Profile Picture">
                                        </div>
                                        <span class="prc-search-user-name">
                                          Test User18
                                        </span>
                                      </span>
                                      <div class="prc-user-lastseen">
                                        <span class="prc-small-last-seen">2 w</span>		</div>
                                      </a>
                                      <div class="clear"></div>
                                    </li>
                                  </div>
                                  <li>
                                    <span class="prc-search-advanced-container">
                                      <a href="{{env('HOME_URL')}}/search" class="prc-search-advanced-link" data-ajax="?link1=search">
                                        <div class="prc-feather-svg-parent">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="prc-feather prc-feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                        </div>
                                        <span style="vertical-align: middle;display: table-cell;padding-left: 10px;">
                                          Advanced Search
                                          <span id="wo_repeat_search"></span>
                                        </span>
                                      </a>
                                    </span>
                                  </li>
                                </ul>
                              </li>
                            </ul>


                            <ul class="prc-nav prc-navbar-nav prc-navbar-right pull-right" id="head_menu_rght">
                              <li class="dropdown prc-requests-container" onclick="Wo_OpenRequestsMenu();">
                                <span class="prc-new-update-alert" style="">7</span>
                                <a href="#" class="dropdown-toggle unread-update prc-sixteen-font-size" data-toggle="dropdown" role="button" aria-expanded="false">
                                  <img src="{{env('HOME_URL')}}/icons/friends.png" width="20px">
                                </a>
                                <ul class="dropdown-menu prc-request-list clearfix prc-notifications-dropdown" role="menu" id="requests-list"><li class="prc-wow_hdr_requests">
                                  <div class="prc-user-request-list user-follow-request-9413">
                                    <div class="prc-user-info">
                                      <div class="prc-avatar">
                                        <a href="{{env('HOME_URL')}}/timeline&amp;u=sahidulshohid1@gmail.com" data-ajax="?link1=timeline&amp;u=sahidulshohid1@gmail.com">
                                          <img src="{{env('HOME_URL')}}/upload/photos/2021/09/24VOLyNrd8XqdZLnYQN7_06_e9693a588a4f404ac5197822e26fe313_avatar.jpg?cache=0" alt="Mr sahidul islam Islam Profile Picture">
                                        </a>
                                      </div>
                                      <a href="{{env('HOME_URL')}}/timeline&amp;u=sahidulshohid1@gmail.com" data-ajax="?link1=timeline&amp;u=sahidulshohid1@gmail.com">Mr sahidul islam Islam</a>
                                      <div class="prc-user-lastseen" data-toggle="tooltip" title="Last Seen:">
                                        <span class="prc-small-last-seen">2 w</span>			</div>
                                      </div>
                                      <div class="accept-btns user-follow-button">
                                        <button type="button" id="accept-9413" onclick="Wo_AcceptFollowRequest(9413)" class="btn btn-default btn-sm btn-active" title="Accept">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z" fill="currentColor"></path></svg>
                                        </button>
                                        <button type="button" id="delete-9413" onclick="Wo_DeleteFollowRequest(9413)" class="btn btn-default btn-sm" title="Delete">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="currentColor"></path></svg>
                                        </button>
                                      </div>
                                    </div>
                                  </li><li class="prc-wow_hdr_requests">
                                    <div class="prc-user-request-list user-follow-request-9347">
                                      <div class="prc-user-info">
                                        <div class="prc-avatar">
                                          <a href="{{env('HOME_URL')}}/Sabujrayhan" data-ajax="?link1=timeline&amp;u=Sabujrayhan">
                                            <img src="{{env('HOME_URL')}}/upload/photos/2021/09/ab5JTSVRwMwT9Ku28p8c_08_0865ee87d69b096c3ff0e62868fb7d63_avatar.jpg?cache=0" alt="Sabuj Rayhan Profile Picture">
                                          </a>
                                        </div>
                                        <a href="{{env('HOME_URL')}}/Sabujrayhan" data-ajax="?link1=timeline&amp;u=Sabujrayhan">Sabuj Rayhan</a>
                                        <div class="prc-user-lastseen" data-toggle="tooltip" title="Last Seen:">
                                          <span class="prc-small-last-seen">2 w</span>			</div>
                                        </div>
                                        <div class="accept-btns user-follow-button">
                                          <button type="button" id="accept-9347" onclick="Wo_AcceptFollowRequest(9347)" class="btn btn-default btn-sm btn-active" title="Accept">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z" fill="currentColor"></path></svg>
                                          </button>
                                          <button type="button" id="delete-9347" onclick="Wo_DeleteFollowRequest(9347)" class="btn btn-default btn-sm" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="currentColor"></path></svg>
                                          </button>
                                        </div>
                                      </div>
                                    </li><li class="prc-wow_hdr_requests">
                                      <div class="prc-user-request-list user-follow-request-9344">
                                        <div class="prc-user-info">
                                          <div class="prc-avatar">
                                            <a href="{{env('HOME_URL')}}/timeline&amp;u=milonbaidya369@gmail.com" data-ajax="?link1=timeline&amp;u=milonbaidya369@gmail.com">
                                              <img src="{{env('HOME_URL')}}/upload/photos/2021/09/o7LtxoZLHPBAdueEoksz_05_b79512bfa3bb3d0b315e7f122785827b_avatar.jpg?cache=0" alt="Milon Baidya Profile Picture">
                                            </a>
                                          </div>
                                          <a href="{{env('HOME_URL')}}/timeline&amp;u=milonbaidya369@gmail.com" data-ajax="?link1=timeline&amp;u=milonbaidya369@gmail.com">Milon Baidya</a>
                                          <div class="prc-user-lastseen" data-toggle="tooltip" title="Last Seen:">
                                            <span class="prc-small-last-seen">2 w</span>			</div>
                                          </div>
                                          <div class="accept-btns user-follow-button">
                                            <button type="button" id="accept-9344" onclick="Wo_AcceptFollowRequest(9344)" class="btn btn-default btn-sm btn-active" title="Accept">
                                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z" fill="currentColor"></path></svg>
                                            </button>
                                            <button type="button" id="delete-9344" onclick="Wo_DeleteFollowRequest(9344)" class="btn btn-default btn-sm" title="Delete">
                                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="currentColor"></path></svg>
                                            </button>
                                          </div>
                                        </div>
                                      </li><li class="prc-wow_hdr_requests">
                                        <div class="prc-user-request-list user-follow-request-9297">
                                          <div class="prc-user-info">
                                            <div class="prc-avatar">
                                              <a href="{{env('HOME_URL')}}/timeline&amp;u=sumonhn11@gmail.com" data-ajax="?link1=timeline&amp;u=sumonhn11@gmail.com">
                                                <img src="{{env('HOME_URL')}}/upload/photos/2021/09/ezeYHJg9eN2ycQt7Az13_04_0b53b4acc973db68f6036a4e057458b3_avatar.jpg?cache=0" alt="Md Sumon Profile Picture">
                                              </a>
                                            </div>
                                            <a href="{{env('HOME_URL')}}/timeline&amp;u=sumonhn11@gmail.com" data-ajax="?link1=timeline&amp;u=sumonhn11@gmail.com">Md Sumon</a>
                                            <div class="prc-user-lastseen" data-toggle="tooltip" title="Last Seen:">
                                              <span class="prc-small-last-seen">2 w</span>			</div>
                                            </div>
                                            <div class="accept-btns user-follow-button">
                                              <button type="button" id="accept-9297" onclick="Wo_AcceptFollowRequest(9297)" class="btn btn-default btn-sm btn-active" title="Accept">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z" fill="currentColor"></path></svg>
                                              </button>
                                              <button type="button" id="delete-9297" onclick="Wo_DeleteFollowRequest(9297)" class="btn btn-default btn-sm" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="currentColor"></path></svg>
                                              </button>
                                            </div>
                                          </div>
                                        </li><li class="prc-wow_hdr_requests">
                                          <div class="prc-user-request-list user-follow-request-9262">
                                            <div class="prc-user-info">
                                              <div class="prc-avatar">
                                                <a href="{{env('HOME_URL')}}/timeline&amp;u=mazarulrana8@gmail.com" data-ajax="?link1=timeline&amp;u=mazarulrana8@gmail.com">
                                                  <img src="{{env('HOME_URL')}}/upload/photos/2021/09/WNLVteNHGEBUnmNIUjd8_04_0a75b1e0b999860a8ab40b625691e8a9_avatar.jpg?cache=0" alt="mazarul rana Profile Picture">
                                                </a>
                                              </div>
                                              <a href="{{env('HOME_URL')}}/timeline&amp;u=mazarulrana8@gmail.com" data-ajax="?link1=timeline&amp;u=mazarulrana8@gmail.com">mazarul rana</a>
                                              <div class="prc-user-lastseen" data-toggle="tooltip" title="Last Seen:">
                                                <span class="prc-small-last-seen">2 w</span>			</div>
                                              </div>
                                              <div class="accept-btns user-follow-button">
                                                <button type="button" id="accept-9262" onclick="Wo_AcceptFollowRequest(9262)" class="btn btn-default btn-sm btn-active" title="Accept">
                                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z" fill="currentColor"></path></svg>
                                                </button>
                                                <button type="button" id="delete-9262" onclick="Wo_DeleteFollowRequest(9262)" class="btn btn-default btn-sm" title="Delete">
                                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="currentColor"></path></svg>
                                                </button>
                                              </div>
                                            </div>
                                          </li><li class="prc-wow_hdr_requests">
                                            <div class="prc-user-request-list user-follow-request-9080">
                                              <div class="prc-user-info">
                                                <div class="prc-avatar">
                                                  <a href="{{env('HOME_URL')}}/mdhasan059" data-ajax="?link1=timeline&amp;u=mdhasan059">
                                                    <img src="{{env('HOME_URL')}}/upload/photos/2021/08/9UmIA22Vfd1T1CyprLyB_27_02a9c851e182a24092ee9a6a2010c77a_avatar.jpg?cache=1630045837" alt="Mohammad Hasan Profile Picture">
                                                  </a>
                                                </div>
                                                <a href="{{env('HOME_URL')}}/mdhasan059" data-ajax="?link1=timeline&amp;u=mdhasan059">Mohammad Hasan</a>
                                              </div>
                                              <div class="accept-btns user-follow-button">
                                                <button type="button" id="accept-9080" onclick="Wo_AcceptFollowRequest(9080)" class="btn btn-default btn-sm btn-active" title="Accept">
                                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z" fill="currentColor"></path></svg>
                                                </button>
                                                <button type="button" id="delete-9080" onclick="Wo_DeleteFollowRequest(9080)" class="btn btn-default btn-sm" title="Delete">
                                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="currentColor"></path></svg>
                                                </button>
                                              </div>
                                            </div>
                                          </li><li class="prc-wow_hdr_requests">
                                            <div class="prc-user-request-list user-follow-request-737">
                                              <div class="prc-user-info">
                                                <div class="prc-avatar">
                                                  <a href="{{env('HOME_URL')}}/SumanMajumder" data-ajax="?link1=timeline&amp;u=SumanMajumder">
                                                    <img src="{{env('HOME_URL')}}/upload/photos/d-avatar.jpg?cache=0" alt="SUMAN MAJUMDER Profile Picture">
                                                  </a>
                                                </div>
                                                <a href="{{env('HOME_URL')}}/SumanMajumder" data-ajax="?link1=timeline&amp;u=SumanMajumder">SUMAN MAJUMDER</a>
                                                <div class="prc-user-lastseen" data-toggle="tooltip" title="Last Seen:">
                                                  <span class="prc-small-last-seen">3 w</span>			</div>
                                                </div>
                                                <div class="accept-btns user-follow-button">
                                                  <button type="button" id="accept-737" onclick="Wo_AcceptFollowRequest(737)" class="btn btn-default btn-sm btn-active" title="Accept">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z" fill="currentColor"></path></svg>
                                                  </button>
                                                  <button type="button" id="delete-737" onclick="Wo_DeleteFollowRequest(737)" class="btn btn-default btn-sm" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="currentColor"></path></svg>
                                                  </button>
                                                </div>
                                              </div>
                                            </li></ul>
                                          </li>
                                          <li class="dropdown messages-notification-container" onclick="Wo_OpenMessagesMenu();">
                                            <span class="prc-new-update-alert hidden" data_messsages_count="0" style="display: none;">
                                            0		</span>
                                            <a href="#" class="dropdown-toggle prc-sixteen-font-size" data-toggle="dropdown" role="button" aria-expanded="false">
                                              <img src="{{env('HOME_URL')}}/icons/messenger.png" width="25px">
                                            </a>
                                            <ul class="dropdown-menu clearfix prc-notifications-dropdown messages-dropdown" role="menu" id="messages-list">
                                              <li>
                                                <h5 class="text-center"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></h5>
                                              </li>
                                            </ul>
                                          </li>
                                          <li class="">

                                            <a href="{{env('HOME_URL')}}/videos" class="prc-sixteen-font-size" aria-expanded="false">
                                              <img src="{{env('HOME_URL')}}/icons/movies.png" width="25px">
                                            </a>

                                          </li>

                                          <li class="">

                                            <a href="{{env('HOME_URL')}}/payrshop/cart" class="prc-sixteen-font-size" aria-expanded="false">
                                              <img src="{{env('HOME_URL')}}/icons/cart.png" width="25px">
                                            </a>

                                            

                                          </li>

                                          <li class="dropdown notification-container" onclick="Wo_OpenNotificationsMenu();">
                                            <span class="prc-new-update-alert hidden" style="display: none;">0</span>
                                            <a href="#" class="dropdown-toggle prc-sixteen-font-size" data-toggle="dropdown" role="button" aria-expanded="false">
                                              <img src="{{env('HOME_URL')}}/icons/notification.png" width="20px">
                                            </a>
                                            <ul class="dropdown-menu clearfix prc-notifications-dropdown" role="menu">
                                              <li onclick="Wo_TurnOffSound();" class="turn-off-sound text-left">
                                                <span>
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="prc-feather prc-feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg> Turn off notification sound									</span>
                                                </li>
                                                <li id="notification-list"><div class="prc-empty_state"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M18.586 20H4a.5.5 0 0 1-.4-.8l.4-.533V10c0-1.33.324-2.584.899-3.687L1.393 2.808l1.415-1.415 19.799 19.8-1.415 1.414L18.586 20zM6.408 7.822A5.985 5.985 0 0 0 6 10v8h10.586L6.408 7.822zM20 15.786l-2-2V10a6 6 0 0 0-8.99-5.203L7.56 3.345A8 8 0 0 1 20 10v5.786zM9.5 21h5a2.5 2.5 0 1 1-5 0z" fill="currentColor"></path></svg>You do not have any notifications</div></li>
                                              </ul>
                                            </li>
                                            <li class="dropdown">
                                              <a href="#" class="dropdown-toggle prc-user-menu-combination" data-toggle="dropdown" role="button" aria-expanded="false">
                                                <div class="prc-user-avatar">
                                                  <img id="updateImage-1" src="{{env('HOME_URL')}}/upload/photos/d-avatar.jpg?cache=0" alt="Salim Khan Profile Picture">
                                                </div>
                                              </a>
                                              <ul class="dropdown-menu prc-ani-acc-menu" role="menu">
                                                <li>
                                                  <a id="update-username" href="{{env('HOME_URL')}}/admin" data-ajax="?link1=timeline&amp;u=admin" class="prc-wow_hdr_menu_usr_lnk">
                                                    <b>Salim Khan</b>
                                                    <img src="{{env('HOME_URL')}}/upload/photos/d-avatar.jpg?cache=0" alt="Salim Khan Profile Picture">
                                                  </a>
                                                </li>
                                                <li><hr></li>
                                                <li>
                                                  <a href="{{env('HOME_URL')}}/wallet/" data-ajax="?link1=wallet">Wallet</a>
                                                </li>

                                                <li>

                                                  <a href="{{env('HOME_URL')}}/url-ads" data-ajax="?link1=url-ads">Free Earn</a>


                                                </li>

                        <!-- <li class="dropdown-search-link">
                    <a href="{{env('HOME_URL')}}/search" data-ajax="?link1=search">Free Earn</a>
                  </li> -->


                  <!--			-->


                  <!--<li class="dropdown-search-link">-->
                    <!--	<a href=""></a>-->
                    <!--</li>-->



                    <li>
                      <a href="{{env('HOME_URL')}}/my-blogs/" data-ajax="?link1=my-blogs">My Articles</a>
                    </li>

            <!-- <li class="dropdown-search-link">
                <a href="{{env('HOME_URL')}}/saved-posts" data-ajax="?link1=saved-posts">Saved Posts				</a>
              </li> -->
                        <!-- <li class="dropdown-search-link">
                <a href="{{env('HOME_URL')}}/search?query=">Explore				</a>
              </li> -->


            <li><hr></li>			<!-- <li class="dropdown-hidden-link">
                <a href="{{env('HOME_URL')}}/setting/profile-setting" data-ajax="?link1=setting&page=profile-setting">Edit</a>
              </li> -->
              <li class="dropdown-hidden-link">
                <a href="{{env('HOME_URL')}}/setting/general-setting" data-ajax="?link1=setting&amp;page=general-setting">General Setting</a>
              </li>
              <li class="dropdown-search-link">
                <a href="{{env('HOME_URL')}}/setting" data-ajax="?link1=setting">Settings</a>
              </li>
              <li><hr></li>
              <li>
                <a href="{{env('HOME_URL')}}/admin-cp">Admin Area</a>
              </li>
              <li><hr></li>
              <li>
                <a href="{{env('HOME_URL')}}/logout/?cache=1632496223">Log Out</a>
              </li>
              <li><hr></li>
            <!-- <li>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#keyboard_shortcuts_box" id="keyboard_shortcut">
                    Keyboard shortcuts					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="prc-feather prc-feather-command"><path d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path></svg>
                </a>
              </li> -->
              <li>
                <a href="javascript:void(0);" id="night_mode_toggle" data-mode="night">
                  <span id="night-mode-text">Night mode</span>
                  <svg class="prc-feather prc-feather-moon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                </a>
              </li>
            </ul>
          </li>
        </ul>      </div>
      </nav></div>


      <div class="prc-barloading"></div>
      <script type="text/javascript">

        jQuery(document).ready(function($) {
          $(".prc-search-input").keydown(function(event) {
            if (event.keyCode == 13 && event.shiftKey == 0) {
              event.preventDefault();
              window.location = '{{env('HOME_URL')}}/search?query=' + $(this).val();
            }
          });
        });
        var Searchcontainer = $('.prc-search-container');
        var SearchBox = $('.prc-search-container .prc-search-input');
        var SearchResult = $('.prc-search-dropdown-result');

        function Wo_ChangeHomeButtonIcon() {

          $('.prc-navbar-home #home-button').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
        }

        function Wo_DetectSearchType(query) {
          var Hash = smokeTheHash(query);
          if (Hash) {
            $('.prc-search-advanced-container').hide(200);
            Wo_SearchhashResult(query);
          } else {
            $('.prc-search-advanced-container').fadeIn(200);
            Wo_SearchResult(query);
          }
        }

        function Wo_ClearSearches() {
          $('.clear-searches').html('<i class="fa fa-spinner fa-spin"></i>');
          $.get(Wo_Ajax_Requests_File(), {f: 'clearChat'}, function(data) {
            if (data.status == 200) {
             location.reload();
           }
         });
        }

        function Wo_GetRecentSearchs() {
          $.get(Wo_Ajax_Requests_File(), {f: 'search', s: 'recent'}, function(data) {
            if (data.status == 200) {
              if (data.html.length > 0) {
                SearchResult.html('<div class="recent"><div class="gray recent-searches pull-left"> Recent Searches</div><div onclick="Wo_ClearSearches();" class="gray recent-searches clear-searches pointer pull-right" style="color: #F44336;"><svg style="vertical-align: middle;margin-top: -3px;" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>Clear</div><div class="clear"></div></div>' + data.html);
              }
            }
          });
        }
        function Wo_SearchResult(query) {
          if (SearchBox.val() != '') {
            Wo_progressIconLoader(Searchcontainer.find('.prc-navbar-form'));
            Searchcontainer.addClass('open');
            Searchcontainer.find('.prc-search-advanced-link').attr('href','{{env('HOME_URL')}}/search/' + query);
            Searchcontainer.find('.prc-search-advanced-link').attr('data-ajax','?link1=search&query=' + query);
            $.get(Wo_Ajax_Requests_File(), {f: 'search', s: 'normal', query: query}, function(data) {
              if (data.status == 200) {
                if (data.html.length == 0) {
                  SearchResult.html('<span class="prc-center-text">' + " No result to show" + '<span>');
                } else {
                  SearchResult.html(data.html);
                }
              }
              Wo_progressIconLoader(Searchcontainer.find('.prc-navbar-form'));
            });
            $(document).click(function() {
              Searchcontainer.removeClass('open');
            });
          } else {
            Searchcontainer.removeClass('open');
          }
        }


        function Wo_SearchhashResult(query) {
          var Searchcontainer = $('.prc-search-container');
          var SearchBox = $('.prc-search-container .prc-search-input');
          var SearchResult = $('.prc-search-dropdown-result');
          if (SearchBox.val() != '') {
            Wo_progressIconLoader(Searchcontainer.find('.prc-navbar-form'));
            Searchcontainer.addClass('open');
            Searchcontainer.find('.prc-search-advanced-link').attr('href','{{env('HOME_URL')}}/search/' + query);
            Searchcontainer.find('.prc-search-advanced-link').attr('data-ajax','?link1=search&query=' + query);
            $.get(Wo_Ajax_Requests_File(), {f: 'search', s: 'hash', query: query}, function(data) {
              if (data.status == 200) {
                if (data.html.length == 0) {
                  SearchResult.html('<span class="prc-center-text">' + " No result to show" + '<span>');
                } else {
                  SearchResult.html(data.html);
                }
              }
              Wo_progressIconLoader(Searchcontainer.find('.prc-navbar-form'));
            });

            $(document).click(function() {
              Searchcontainer.removeClass('open');
            });
          } else {
            Searchcontainer.removeClass('open');
          }
        }

        function smokeTheHash(str) {
          var n = str.search("#");
          if(n != "-1"){
            return true;
          } else {
            return false;
          }
        }
      </script>         </header>
      <div class="prc-content-container prc-container" style="transform: none;">
       <div class="prc-ad-placement-header-footer">
       </div>
       <div id="contnet" style="transform: none;"><div class="prc-page-margin" style="transform: none;">
        <div class="prc-row" style="transform: none;">
          <div class="prc-col-md-2 prc-leftcol" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 508.766px;">



            <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: fixed; transform: translateY(65px); width: 181px; left: 131px; top: 0px;"><div class="prc-left-sidebar">
              <ul>
                <li class="prc-wow_side_post_fltr">
                  <a class="main_menu" href="{{env('HOME_URL')}}" data-ajax="?index.php?link1=home">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#047cac" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z"></path></svg> News Feed				</a>
                  </li>
                  <li class="prc-wow_side_post_fltr">

                    <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/admin" data-ajax="?link1=timeline&amp;u=admin">
                      <img src="{{env('HOME_URL')}}/icons/tag-friend.png" width="25px"> My Profile				</a>

                    </li>

                    <li class="prc-wow_side_post_fltr">

                      <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/messages" data-ajax="?link1=messages">
                        <img src="{{env('HOME_URL')}}/icons/messenger.png" width="25px"> Chat
                      </a>

                    </li>

                    <li class="prc-wow_side_post_fltr">

                      <a class="main_menu" href="{{env('HOME_URL')}}/pages" data-ajax="?link1=pages">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f79f58" d="M14.4,6L14,4H5V21H7V14H12.6L13,16H20V6H14.4Z"></path></svg> Pages				</a>

                      </li>

                      <li class="prc-wow_side_post_fltr">

                        <a class="main_menu" href="{{env('HOME_URL')}}/groups" data-ajax="?link1=groups">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#03A9F4" d="M5 3A2 2 0 0 0 3 5H5M7 3V5H9V3M11 3V5H13V3M15 3V5H17V3M19 3V5H21A2 2 0 0 0 19 3M3 7V9H5V7M7 7V11H11V7M13 7V11H17V7M19 7V9H21V7M3 11V13H5V11M19 11V13H21V11M7 13V17H11V13M13 13V17H17V13M3 15V17H5V15M19 15V17H21V15M3 19A2 2 0 0 0 5 21V19M7 19V21H9V19M11 19V21H13V19M15 19V21H17V19M19 19V21A2 2 0 0 0 21 19Z"></path></svg> Friends Clubs				</a>

                        </li>

                        <li class="prc-wow_side_post_fltr">
                          <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/friends-nearby/" data-ajax="?link1=friends-nearby">
                            <img src="{{env('HOME_URL')}}/icons/friends.png" width="25px"> People You May Know
                          </a>
                        </li>

                        <li class="prc-wow_side_post_fltr">

                          <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/blogs">
                            <img src="{{env('HOME_URL')}}/icons/blog.png" width="25px"> Blog				</a>


                          </li>

                          <li class="prc-wow_side_post_fltr">

                            <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/videos">
                              <img src="{{env('HOME_URL')}}/icons/movies.png" width="25px"> Videos
                            </a>

                          </li>

                          <li class="prc-wow_side_post_fltr">

                            <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/albums" data-ajax="?link1=albums">
                              <img src="{{env('HOME_URL')}}/icons/gallery.png" width="25px"> Albums				</a>
                            </li>

                            <li>
                              <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/new-game" data-ajax="?link1=new-game">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#03A9F4" d="M16.5,9L13.5,12L16.5,15H22V9M9,16.5V22H15V16.5L12,13.5M7.5,9H2V15H7.5L10.5,12M15,7.5V2H9V7.5L12,10.5L15,7.5Z"></path></svg> Games				</a>
                              </li>

                              <li>
                                <a class="main_menu" href="{{env('HOME_URL')}}/jobs" data-ajax="?link1=jobs">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4caf50" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z"></path></svg> Jobs			</a>
                                </li>

                                <li>
                                  <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/poke" data-ajax="?link1=poke">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#009688" d="M21,9A1,1 0 0,1 22,10A1,1 0 0,1 21,11H16.53L16.4,12.21L14.2,17.15C14,17.65 13.47,18 12.86,18H8.5C7.7,18 7,17.27 7,16.5V10C7,9.61 7.16,9.26 7.43,9L11.63,4.1L12.4,4.84C12.6,5.03 12.72,5.29 12.72,5.58L12.69,5.8L11,9H21M2,18V10H5V18H2Z"></path></svg> Pokes				</a>
                                  </li>

                                  <li>
                                    <a class="main_menu" onclick="closeNav()" href="{{env('HOME_URL')}}/most_liked" data-ajax="?link1=most_liked">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8d73cc" d="M20 22H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1zm-1-2V4H5v16h14zM7 6h4v4H7V6zm0 6h10v2H7v-2zm0 4h10v2H7v-2zm6-9h4v2h-4V7z"></path></svg> Popular Posts					</a>
                                    </li>

                                    <br>
                                    <p style="color: black;">
                                      <b>© 2021 Payrchat</b>

                                      All Rights Reserved
                                    </p>
                                  </ul>
                                </div></div></div>

                                @yield('main')

                                <script style="">

                                  function addZero(i) {
                                    if (i < 10) {
                                      i = "0" + i;
                                    }
                                    return i;
                                  }

                                  function getWeekdayForecast(offset) {

                                    var d = new Date();
                                    var weekday = new Array(7);
    // weekday[0]=  "Sunday";
    // weekday[1] = "Monday";
    // weekday[2] = "Tuesday";
    // weekday[3] = "Wednesday";
    // weekday[4] = "Thursday";
    // weekday[5] = "Friday";
    // weekday[6] = "Saturday";
    weekday['Sun']=  "Sunday";
    weekday['Mon'] = "Monday";
    weekday['Tue'] = "Tuesday";
    weekday['Wed'] = "Wednesday";
    weekday['Thu'] = "Thursday";
    weekday['Fri'] = "Friday";
    weekday['Sat'] = "Saturday";
    return weekday[offset];

    // if (d.getDay() + offset >= 7) {
    //  return weekday[(d.getDay() + offset) - 7];
    // }
    // else {
    //   return weekday[d.getDay() + offset];
    // }
  };


  function Wo_GetNewActivities() {
    var before_activity_id = $('#activities-wrapper > .activity').attr('data-activity-id');
    if (typeof before_activity_id === 'undefined') {
     return false;
   }
   $.post(Wo_Ajax_Requests_File() + '?f=activities&s=get_new_activities', {
    before_activity_id: before_activity_id
  }, function (data) {
    if(data.status == 200) {
      $('.activities-wrapper').prepend(data.html);
    }
  });
  }
  function Wo_GetMoreActivities() {
    var activity_container = $('.activity-container');
    var after_activity_id = $('#activities-wrapper .activity:last').attr('data-activity-id');
    Wo_progressIconLoader(activity_container);
    $.post(Wo_Ajax_Requests_File() + '?f=activities&s=get_more_activities', {
      after_activity_id: after_activity_id
    }, function (data) {
      if(data.status == 200) {
        if(data.html.length == 0) {
          $('.no-activities').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18 8H8C6.9 8 6 8.9 6 10V16C6 17.11 6.9 18 8 18H18C19.11 18 20 17.11 20 16V10C20 8.9 19.11 8 18 8M14 16H8V14H14V16M18 12H8V10H18V12M22 6H4V22H2V2H4V4H22V6Z" /></svg>' + data.message);
        } else {
          $('#activities-wrapper').append(data.html);
        }
        $("#activities-wrapper").animate({
          scrollTop: $('#activities-wrapper')[0].scrollHeight
        }, 100);
        Wo_progressIconLoader(activity_container);
      }
    });
  }
  $(function() {
   $('form.invite-user-form').ajaxForm({
     url: Wo_Ajax_Requests_File() + '?f=invite_user',
     beforeSend: function() {
       Wo_progressIconLoader($('form.invite-user-form').find('button'));
     },
     success: function(data) {
       if (data.status == 200) {
        $('.invite-user-form-alert').html('<div class="alert alert-success">' + data.message + '</div>');
        $('.alert-success').fadeIn(300);
      } else {
       var errors = data.errors.join("<br>");
       $('.invite-user-form-alert').html('<div class="alert alert-danger">' + errors + '</div>');
       $('.alert-danger').fadeIn(300);
     }
     Wo_progressIconLoader($('form.invite-user-form').find('button'));
   }
  });
  });

  var userStep = 170;
  var userScrolling = false;

  // Wire up events for the 'scrollUp' link:
  $("#scrollRight").bind("click", function(event) {
    event.preventDefault();
    $(".sidebar-product-slider").animate({
      scrollLeft: "-=" + userStep + "px"
    });
  });

  $("#scrollLeft").bind("click", function(event) {
    event.preventDefault();
    $(".sidebar-product-slider").animate({
      scrollLeft: "+=" + userStep + "px"
    });
  });

  function scrollContent(direction) {
    var amount = (direction === "right" ? "-=1px" : "+=1px");
    $(".sidebar-product-slider").animate({
      scrollLeft: amount
    }, 1, function() {
      if (userScrolling) {
        scrollContent(direction);
      }
    });
  }


  $(document).ready(function(){
    $('.wo_pro_users').slick({
      centerMode: true,
      centerPadding: '1px',
      slidesToShow: 3,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      speed: 900,
      responsive: [
      {
        breakpoint: 992,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 5
        }
      },
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 4
        }
      },
      {
        breakpoint: 520,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 3
        }
      },
      {
        breakpoint: 420,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 2
        }
      },
      {
        breakpoint: 340,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
      ]
    });
  });
  </script>

  </div>
  </div></div>
  <footer></footer>
  <div class="second-footer" style="display: none; "></div>

  </div>
        <div class="prc-lb-preloader"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div>

        <div class="modal fade" id="keyboard_shortcuts_box" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="prc-feather prc-feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                <h4 class="modal-title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="prc-feather prc-feather-command"><path d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path></svg> Keyboard shortcuts</h4>
              </div>
              <div class="modal-body">
                <table class="key_shortcts">
                  <tbody>
                    <tr>
                      <th><span>J</span></th>
                      <td>Scroll to the next post</td>
                    </tr>
                    <tr>
                      <th><span>K</span></th>
                      <td>Scroll to the previous post</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- JS FILES -->
        <script type="text/javascript">
          const node_socket_flow = "0"
        </script>
        <script type="text/javascript" src="{{env('HOME_URL')}}/themes/wowonder/javascript/script.js?version=3.2.1"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOfpaMO_tMMsuvS2T4zx4llbtsFqMuT9Y&amp;libraries=places"></script>
        <script src="{{env('HOME_URL')}}/themes/wowonder/javascript/audioRecord/recorder.js?version=3.2.1"></script>
        <script src="{{env('HOME_URL')}}/themes/wowonder/javascript/audioRecord/record.js?version=3.2.1"></script>
        <div class="extra-css"></div>
        <script>$(document).ready(function() {$('div.prc-leftcol').theiaStickySidebar({additionalMarginTop: 65});});</script>
        <script type="text/javascript">jQuery(document).ready(function() {jQuery('.custom-fixed-element').theiaStickySidebar({additionalMarginTop: 65});});</script>

        <!-- End 'JS FILES' -->
        <script type="text/javascript">
          (function (factory) {
            if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module.
    define(['jquery'], factory);
  } else {
    // Browser globals
    factory(jQuery);
  }
  }(function ($) {
    $.timeago = function(timestamp) {
      if (timestamp instanceof Date) {
        return inWords(timestamp);
      } else if (typeof timestamp === "string") {
        return inWords($.timeago.parse(timestamp));
      } else if (typeof timestamp === "number") {
        return inWords(new Date(timestamp));
      } else {
        return inWords($.timeago.datetime(timestamp));
      }
    };
    var $t = $.timeago;

    $.extend($.timeago, {
      settings: {
        refreshMillis: 60000,
        allowPast: true,
        allowFuture: false,
        localeTitle: false,
        cutoff: 0,
        strings: {
          prefixAgo: null,
          prefixFromNow: null,
          suffixAgo: "ago",
          suffixFromNow: "from now",
          inPast: "any moment now",
          seconds: "now",
          minute: "minute",
          minutes: "minutes",
          hour: "hour",
          hours: "hours",
          day: "day",
          days: "days",
          month: "month",
          months: "months",
          year: "year",
          years: "years",
          wordSeparator: " ",
          numbers: []
        }
      },

      inWords: function(distanceMillis) {
        if(!this.settings.allowPast && ! this.settings.allowFuture) {
          throw 'timeago allowPast and allowFuture settings can not both be set to false.';
        }

        var $l = this.settings.strings;
        var prefix = $l.prefixAgo;
        var suffix = $l.suffixAgo;
        if (this.settings.allowFuture) {
          if (distanceMillis < 0) {
            prefix = $l.prefixFromNow;
            suffix = $l.suffixFromNow;
          }
        }

        if(!this.settings.allowPast && distanceMillis >= 0) {
          return this.settings.strings.inPast;
        }

        var seconds = Math.abs(distanceMillis) / 1000;
        var minutes = seconds / 60;
        var hours = minutes / 60;
        var days = hours / 24;
        var weeks = days / 7;
        var years = days / 365;

        function substitute(stringOrFunction, number) {
          var string = $.isFunction(stringOrFunction) ? stringOrFunction(number, distanceMillis) : stringOrFunction;
          var value = ($l.numbers && $l.numbers[number]) || number;
          return number+' '+string.replace(/%d/i, value);
        //return string.replace(/%d/i, value);
      }

        // var words = seconds < 45 && substitute($l.seconds, '') ||
        // seconds < 90 && substitute('m', 1) ||
        // minutes < 45 && substitute('m', Math.round(minutes)) ||
        // minutes < 90 && substitute('h', 1) ||
        // hours < 24 && substitute('hrs', Math.round(hours)) ||
        // hours < 42 && substitute('d', 1) ||
        // days < 7 && substitute('d', Math.round(days)) ||
        // weeks < 2 && substitute('w', 1) ||
        // weeks < 52 && substitute('w', Math.round(weeks)) ||
        // years < 1.5 && substitute('y', 1) ||
        // substitute('yrs', Math.round(years));
        var words = '';
        if (seconds < 45) {
          words = substitute($l.seconds, '');
        }
        else if (seconds < 90) {
          words = substitute('m', 1);
        }
        else if (minutes < 45) {
          words = substitute('m', Math.round(minutes));
        }
        else if (minutes < 90) {
          words = substitute('h', 1);
        }
        else if (hours < 24) {
          words = substitute('hrs', Math.round(hours));
        }
        else if (hours < 42) {
          words = substitute('d', 1);
        }
        else if (days < 7) {
          words = substitute('d', Math.round(days));
        }
        else if (weeks < 2) {
          words = substitute('w', 1);
        }
        else if (weeks < 52) {
          words = substitute('w', Math.round(weeks));
        }
        else if (years < 1.5) {
          words = substitute('y', 1);
        }
        else {
          words = substitute('yrs', Math.round(years));
        }



        var separator = $l.wordSeparator || "";
        if ($l.wordSeparator === undefined) { separator = " "; }


        return $.trim([prefix, words].join(separator));

      },

      parse: function(iso8601) {
        var s = $.trim(iso8601);
      s = s.replace(/\.\d+/,""); // remove milliseconds
      s = s.replace(/-/,"/").replace(/-/,"/");
      s = s.replace(/T/," ").replace(/Z/," UTC");
      s = s.replace(/([\+\-]\d\d)\:?(\d\d)/," $1$2"); // -04:00 -> -0400
      s = s.replace(/([\+\-]\d\d)$/," $100"); // +09 -> +0900
      return new Date(s);
    },
    datetime: function(elem) {
      var iso8601 = $t.isTime(elem) ? $(elem).attr("datetime") : $(elem).attr("title");
      return $t.parse(iso8601);
    },
    isTime: function(elem) {
      // jQuery's `is()` doesn't play well with HTML5 in IE
      return $(elem).get(0).tagName.toLowerCase() === "time"; // $(elem).is("time");
    }
  });

  // functions that can be called via $(el).timeago('action')
  // init is default when no action is given
  // functions are called with context of a single element
  var functions = {
    init: function(){
      var refresh_el = $.proxy(refresh, this);
      refresh_el();
      var $s = $t.settings;
      if ($s.refreshMillis > 0) {
        this._timeagoInterval = setInterval(refresh_el, $s.refreshMillis);
      }
    },
    update: function(time){
      var parsedTime = $t.parse(time);
      $(this).data('timeago', { datetime: parsedTime });
      if($t.settings.localeTitle) $(this).attr("title", parsedTime.toLocaleString());
      refresh.apply(this);
    },
    updateFromDOM: function(){
      $(this).data('timeago', { datetime: $t.parse( $t.isTime(this) ? $(this).attr("datetime") : $(this).attr("title") ) });
      refresh.apply(this);
    },
    dispose: function () {
      if (this._timeagoInterval) {
        window.clearInterval(this._timeagoInterval);
        this._timeagoInterval = null;
      }
    }
  };

  $.fn.timeago = function(action, options) {
    var fn = action ? functions[action] : functions.init;
    if(!fn){
      throw new Error("Unknown function name '"+ action +"' for timeago");
    }
    // each over objects here and call the requested function
    this.each(function(){
      fn.call(this, options);
    });
    return this;
  };

  function refresh() {
    var data = prepareData(this);
    var $s = $t.settings;

    if (!isNaN(data.datetime)) {
      if ( $s.cutoff == 0 || Math.abs(distance(data.datetime)) < $s.cutoff) {
        $(this).text(inWords(data.datetime));
      }
    }
    return this;
  }

  function prepareData(element) {
    element = $(element);
    if (!element.data("timeago")) {
      element.data("timeago", { datetime: $t.datetime(element) });
      var text = $.trim(element.text());
      if ($t.settings.localeTitle) {
        element.attr("title", element.data('timeago').datetime.toLocaleString());
      } else if (text.length > 0 && !($t.isTime(element) && element.attr("title"))) {
        element.attr("title", text);
      }
    }
    return element.data("timeago");
  }

  function inWords(date) {
    return $t.inWords(distance(date));
  }

  function distance(date) {
    return (new Date().getTime() - date.getTime());
  }

  // fix for IE6 suckage
  document.createElement("abbr");
  document.createElement("time");
  }));


  $(function () {
    setInterval(function () {

      if ( $('.ajax-time').length > 0) {
        $('.ajax-time').timeago()
        .removeClass('.ajax-time');
      }
    },
    1000);
  });
  </script>
  <script>

   var create_bar = $('.create-product-bar');
   var create_percent = $('.create-product-percent');
   $(document).ready(function() {

    $('form.edit-offer-form').ajaxForm({
      url: Wo_Ajax_Requests_File() + '?f=offer&s=edit_offer',
      beforeSend: function() {
       var percentVal = '0%';
       create_bar.width(percentVal);
       create_percent.html(percentVal);


       $('.edit-offer-form').find('.last-sett-btn .ball-pulse').fadeIn(100);
     },
     uploadProgress: function (event, position, total, percentComplete) {
       var percentVal = percentComplete + '%';
       create_bar.width(percentVal);
       $('.edit-offer-form').find('.create-product-progress').slideDown(200);
       create_percent.html(percentVal);
     },
     success: function(data) {
       if (data.status == 200) {
         $('.edit-offer-form').find('.app-general-alert').html("<div class='alert alert-success'>Offer successfully updated.</div>");
         $('.edit-offer-form').find('.alert-success').fadeIn(300);
         setTimeout(function (argument) {
          $('.edit-offer-form').find('.alert-success').fadeOut(300);
          window.location.reload(true);

        },3000);
       } else {
        $('.edit-offer-form').animate({
              scrollTop: $('html, body').offset().top //#DIV_ID is an example. Use the id of your destination on the page
            });
        $('.edit-offer-form').find('.app-general-alert').html('<div class="alert alert-danger">' + data.error + '</div>');
        $('.edit-offer-form').find('.alert-danger').fadeIn(300);
        setTimeout(function (argument) {
          $('.edit-offer-form').find('.alert-danger').fadeOut(300);

        },3000);
      }
      $('.edit-offer-form').find('.last-sett-btn .ball-pulse').fadeOut(100);
    }
  });

  });
   function Wo_RegisterReactionLike(element,reaction_icon,is_html){

    var reaction = parseInt($(element).attr('data-reaction-id'));
    var post_id = $(element).attr('data-post-id');

    if ($('#react_'+post_id).attr('data_react') == 1) {
      return false;
    }

    var path = "{{env('HOME_URL')}}/themes/wowonder";
    var lang = $(element).attr('data-reaction-lang');
    if (!post_id || !reaction) {
      return false;
    }

    $('.reactions-box-container-'+post_id).fadeOut(1);

    //var reaction_icon = '';
    var reaction_color = '';

  //   switch (reaction) {
  //     case 'Like':
  //         reaction_icon = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--like"><div class="emoji__hand"><div class="emoji__thumb"></div></div></div></div>';
  //         reaction_color = '#1da1f2';
  //         break;
  //     case 'Love':
  //         reaction_icon = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--love"><div class="emoji__heart"></div></div></div>';
  //         reaction_color = '#f25268';
  //         break;
  //     case 'HaHa':
  //         reaction_icon = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--haha"><div class="emoji__face"><div class="emoji__eyes"></div><div class="emoji__mouth"><div class="emoji__tongue"></div></div></div></div></div>';
  //         reaction_color = '#f3b715';
  //         break;
  //     case 'Wow':
  //         reaction_icon = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--wow"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
  //         reaction_color = '#f3b715';
  //         break;
  //     case 'Sad':
  //         reaction_icon = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--sad"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
  //         reaction_color = '#f3b715';
  //         break;
  //     case 'Angry':
  //         reaction_icon = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--angry"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
  //         reaction_color = '#f7806c';
  //         break;
  // }
  if (is_html == 1) {
    switch (reaction) {
      case 1:
      reaction_html = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--like"><div class="emoji__hand"><div class="emoji__thumb"></div></div></div></div>';
      reaction_color = '#1da1f2';
      break;
      case 2:
      reaction_html = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--love"><div class="emoji__heart"></div></div></div>';
      reaction_color = '#f25268';
      break;
      case 3:
      reaction_html = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--haha"><div class="emoji__face"><div class="emoji__eyes"></div><div class="emoji__mouth"><div class="emoji__tongue"></div></div></div></div></div>';
      reaction_color = '#f3b715';
      break;
      case 4:
      reaction_html = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--wow"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
      reaction_color = '#f3b715';
      break;
      case 5:
      reaction_html = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--sad"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
      reaction_color = '#f3b715';
      break;
      case 6:
      reaction_html = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--angry"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
      reaction_color = '#f7806c';
      break;
    }

  }
  else{
    reaction_html = '<div class="inline_post_emoji no_anim"><div class="reaction"><img src="'+reaction_icon+'"></div></div>';
    reaction_color = '';
  }


  $('.status-reaction-'+post_id).html(''+reaction_html+'' + lang).css({"color": reaction_color});
  $('.status-reaction-'+post_id).addClass("active-like");
  $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'register_reaction', post_id: post_id, reaction: reaction}, function (data) {

    if(data.status == 200) {
     $('.post-reactions-icons-'+post_id).html(data.reactions);

   }
   if (data.can_send == 1) {
    Wo_SendMessages();
  }
  $('#react_'+post_id).attr('data_react','1');
  });
  }

  function Wo_RegisterStoryReaction(element,reaction_icon,is_html) {
    var reaction = parseInt($(element).attr('data-reaction-id'));
    var post_id = $(element).attr('data-post-id');
    var path = "{{env('HOME_URL')}}/themes/wowonder";
    var lang = $(element).attr('data-reaction-lang');
    if (!post_id || !reaction) {
      return false;
    }
    $('.like-story-lightbox').addClass('active');
    $.get(Wo_Ajax_Requests_File(), {f: 'status', s: 'register_reaction', story_id: post_id, reaction: reaction}, function (data) {
      if(data.status == 200) {
        $('.post-reactions-icons-'+post_id).html(data.reactions);

      }
      if (data.can_send == 1) {
        Wo_SendMessages();
      }
    //$('#react_'+post_id).attr('data_react','1');
  });
  }

  function Wo_RegisterMessageReaction(element,reaction_icon,is_html) {
    var reaction = parseInt($(element).attr('data-reaction-id'));
    var post_id = $(element).attr('data-post-id');
    var path = "{{env('HOME_URL')}}/themes/wowonder";
    var lang = $(element).attr('data-reaction-lang');
    if (!post_id || !reaction) {
      return false;
    }
    $.get(Wo_Ajax_Requests_File(), {f: 'messages', s: 'register_reaction', message_id: post_id, reaction: reaction}, function (data) {
      if(data.status == 200) {
        $('.post-reactions-icons-m-'+post_id).html(data.reactions);
        $('.mess_margin_b-'+post_id).addClass('margin-active');
      }
      if (data.can_send == 1) {
        Wo_SendMessages();
      }
        //$('#react_'+post_id).attr('data_react','1');
      });

    $('.reactions-box-container-'+post_id).fadeOut(50);

  }
  function Wo_RegisterReaction(element,reaction_icon,is_html){
    var reaction = parseInt($(element).attr('data-reaction-id'));
    var post_id = $(element).attr('data-post-id');
    var path = "{{env('HOME_URL')}}/themes/wowonder";
    var lang = $(element).attr('data-reaction-lang');
    if (!post_id || !reaction) {
      return false;
    }

    $('.reactions-box-container-'+post_id).fadeOut(1);

    var reaction_color = '';
    if (is_html == 1) {
      switch (reaction) {
        case 1:
        reaction_html = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--like"><div class="emoji__hand"><div class="emoji__thumb"></div></div></div></div>';
        reaction_color = '#1da1f2';
        break;
        case 2:
        reaction_html = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--love"><div class="emoji__heart"></div></div></div>';
        reaction_color = '#f25268';
        break;
        case 3:
        reaction_html = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--haha"><div class="emoji__face"><div class="emoji__eyes"></div><div class="emoji__mouth"><div class="emoji__tongue"></div></div></div></div></div>';
        reaction_color = '#f3b715';
        break;
        case 4:
        reaction_html = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--wow"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
        reaction_color = '#f3b715';
        break;
        case 5:
        reaction_html = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--sad"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
        reaction_color = '#f3b715';
        break;
        case 6:
        reaction_html = '<div class="inline_post_emoji no_anim"><div class="emoji emoji--angry"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>';
        reaction_color = '#f7806c';
        break;
      }

    }
    else{
      reaction_html = '<div class="inline_post_count_emoji reaction"><img src="'+reaction_icon+'"></div>&nbsp;&nbsp;';
      reaction_color = '';
    }

    $('.status-reaction-'+post_id).html(''+reaction_html+'' + lang).css({"color": reaction_color});
    $('.status-reaction-'+post_id).addClass("active-like");
    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'register_reaction', post_id: post_id, reaction: reaction}, function (data) {
      if(data.status == 200) {
        $('.post-reactions-icons-'+post_id).html(data.reactions);

      }
      if (data.can_send == 1) {
        Wo_SendMessages();
      }
      $('#react_'+post_id).attr('data_react','1');
    });
  }


  function Wo_RegisterFollowNotify(id, type) {
    var _follow_con = $('[id=Notify-' + id + ']');
    data_next = $('[id=Notify-' + id + ']').attr('title');
    title = $('[id=Notify-' + id + ']').attr('data_next');
    html_ = '<span id="Notify-' + id + '" title="'+title+'" data_next="'+data_next+'" class="btn-glossy"><button type="button" onclick="Wo_RegisterFollowNotify(' + id + ',0)" class="btn-active btn btn-default btn-sm wo_following_btn wo_user_folw_empty_btns" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="prc-feather prc-feather-bell-off"><path d="M13.73 21a2 2 0 0 1-3.46 0"></path><path d="M18.63 13A17.89 17.89 0 0 1 18 8"></path><path d="M6.26 6.26A5.86 5.86 0 0 0 6 8c0 7-3 9-3 9h14"></path><path d="M18 8a6 6 0 0 0-9.33-5"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg></button></span>';
    if (type == 0) {
      html_ = '<span id="Notify-' + id + '" title="'+title+'" data_next="'+data_next+'" class="btn-glossy"><button type="button" onclick="Wo_RegisterFollowNotify(' + id + ',1)" class="btn btn-default btn-sm wo_user_folw_empty_btns" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="prc-feather prc-feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg></button></span>';
    }

    _follow_con.replaceWith(html_);

    $.get(Wo_Ajax_Requests_File(), {f: 'notify_user', following_id: id}, function(data) {});

  }





  function Wo_RegisterFollow(id, is_confirm,show_modal= false) {
    var _follow_con = $('[id=Follow-' + id + ']');
    is_confirm_f    = 0;

    if (is_confirm == 1) {
      is_confirm_f = 1;
    }
    if (show_modal == true) {
      $('#unfriend_btn').attr('onclick', 'Wo_RegisterFollow('+id+')');
      $('#un_friend_modal').modal('show');
      return false;
    }
    $('#un_friend_modal').modal('hide');

      // if (_follow_con.find('button').hasClass('btn-active')) {
    //   if (!confirm("Are you sure you want to unfriend?")) {
    //       return false;
    //   }
    // }
    html_ = '<button type="button" onclick="Wo_RegisterFollow(' + id + ')" class="btn-requested btn btn-default btn-sm wo_request_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg><span class="button-text"> Requested</span></button>';
    if (_follow_con.find('button').hasClass('btn-requested') || _follow_con.find('button').hasClass('btn-active')) {
      html_ = '<button type="button" onclick="Wo_RegisterFollow(' + id + ')" class="btn btn-default btn-sm wo_follow_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg><span class="button-text"> Add Friend</span></button>';

    }


    _follow_con.html(html_);

    $.get(Wo_Ajax_Requests_File(), {f: 'follow_user', following_id: id}, function(data) {

      if (_follow_con.find('button').hasClass('btn-requested') || _follow_con.find('button').hasClass('btn-active')) {
        if (node_socket_flow == "1") {
         socket.emit("user_notification", { to_id: id, user_id: _getCookie("user_id"), type: "request" });
       }
     } else {
      if (node_socket_flow == "1") {
       socket.emit("user_notification", { to_id: id, user_id: _getCookie("user_id"), type: "request_removed" });
     }
   }

   if (data.can_send == 1) {
    Wo_SendMessages();
  }

  else if(data.status == 400){
    html_ = '<button type="button" onclick="Wo_RegisterFollow(' + id + ')" class="btn btn-default btn-sm wo_follow_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg><span class="button-text"> Add Friend</span></button>';
    _follow_con.html(html_);

    $("#modal-alert").modal('show');

    Wo_Delay(function(){
      $("#modal-alert").modal('hide');
    },3000);
  }
  });

  }

  function Wo_RegisterGroupJoin(id, is_confirm) {
    var _join_con = $('[id=join-' + id + ']');
    is_confirm_ = 0;
    if (is_confirm == 1) {
      is_confirm_ = 1;
    }
    html_join = '<button type="button" onclick="Wo_RegisterGroupJoin(' + id + ', ' + is_confirm_ + ')" class="btn-active btn btn-default btn-sm wo_following_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg><span class="button-text"> Joined</span></button>';
    if (is_confirm_ == 1) {
      html_join = '<button type="button" onclick="Wo_RegisterGroupJoin(' + id + ', ' + is_confirm_ + ')" class="btn-requested btn btn-default btn-sm wo_request_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg><span class="button-text"> Requested</span></button>';
    }
    if (_join_con.find('button').hasClass('btn-requested') || _join_con.find('button').hasClass('btn-active')) {
      html_join = '<button type="button" onclick="Wo_RegisterGroupJoin(' + id + ', ' + is_confirm_ + ')" class="btn btn-default btn-sm wo_follow_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg><span class="button-text"> Join</span></button>';
    }
    _join_con.html(html_join);
    $.get(Wo_Ajax_Requests_File(), {f: 'join_group', group_id: id}, function (data) {
      if (node_socket_flow == "1") {
        if (_join_con.find('button').hasClass('btn-active') || _join_con.find('button').hasClass('btn-requested')) {
          socket.emit("group_notification", { to_id: id, user_id: _getCookie("user_id"), type: "added" });
        } else {
          socket.emit("group_notification", { to_id: id, user_id: _getCookie("user_id"), type: "removed" });
        }
      }
      if (data.can_send == 1) {
        Wo_SendMessages();
      }
    });
  }

  function Wo_RegisterEventGoing(id) {
    var _join_con = $('[id=going-' + id + ']');
    html_join = '<button type="button" onclick="Wo_RegisterEventGoing(' + id + ')" class="btn btn-main btn-mat"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M0.41,13.41L6,19L7.41,17.58L1.83,12M22.24,5.58L11.66,16.17L7.5,12L6.07,13.41L11.66,19L23.66,7M18,7L16.59,5.58L10.24,11.93L11.66,13.34L18,7Z" /></svg> <span class="button-text"> Joined</span></button>';
    if (_join_con.find('button').hasClass('btn-main')) {
      html_join = '<button type="button" onclick="Wo_RegisterEventGoing(' + id + ')" class="btn btn-default btn-mat"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10.74,11.72C11.21,12.95 11.16,14.23 9.75,14.74C6.85,15.81 6.2,13 6.16,12.86L10.74,11.72M5.71,10.91L10.03,9.84C9.84,8.79 10.13,7.74 10.13,6.5C10.13,4.82 8.8,1.53 6.68,2.06C4.26,2.66 3.91,5.35 4,6.65C4.12,7.95 5.64,10.73 5.71,10.91M17.85,19.85C17.82,20 17.16,22.8 14.26,21.74C12.86,21.22 12.8,19.94 13.27,18.71L17.85,19.85M20,13.65C20.1,12.35 19.76,9.65 17.33,9.05C15.22,8.5 13.89,11.81 13.89,13.5C13.89,14.73 14.17,15.78 14,16.83L18.3,17.9C18.38,17.72 19.89,14.94 20,13.65Z" /></svg> <span class="button-text"> Join</span></button>';
    }
    _join_con.html(html_join);
    $.get(Wo_Ajax_Requests_File(), {f: 'go_event', event_id: id}, function (data) {
      if (node_socket_flow == "1") {
        if (_join_con.find('button').hasClass('btn-main')) {
          socket.emit("event_notification", { to_id: id, user_id: _getCookie("user_id"), type: "added" });
        } else {
          socket.emit("event_notification", { to_id: id, user_id: _getCookie("user_id"), type: "removed" });
        }
      }
      if (data.can_send == 1) {
        Wo_SendMessages();
      }
    });
  }

  function Wo_RegisterEventInterested(id) {
    var _join_con = $('[id=interested-' + id + ']');
    html_join = '<button type="button" onclick="Wo_RegisterEventInterested(' + id + ')" class="btn btn-main btn-mat"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M0.41,13.41L6,19L7.41,17.58L1.83,12M22.24,5.58L11.66,16.17L7.5,12L6.07,13.41L11.66,19L23.66,7M18,7L16.59,5.58L10.24,11.93L11.66,13.34L18,7Z" /></svg> <span class="button-text"> Interested</span></button>';
    if (_join_con.find('button').hasClass('btn-main')) {
      html_join = '<button type="button" onclick="Wo_RegisterEventInterested(' + id + ')" class="btn btn-default btn-mat"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.5,5C15,5 13.58,5.91 13,7.2V17.74C17.25,13.87 20,11.2 20,8.5C20,6.5 18.5,5 16.5,5M16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3Z" /></svg> <span class="button-text"> Interested</span></button>';
    }
    _join_con.html(html_join);
    $.get(Wo_Ajax_Requests_File(), {f: 'interested_event', event_id: id}, function (data) {
     if (node_socket_flow == "1") {
      if (_join_con.find('button').hasClass('btn-main')) {
        socket.emit("event_notification", { to_id: id, user_id: _getCookie("user_id"), type: "added" });
      } else {
        socket.emit("event_notification", { to_id: id, user_id: _getCookie("user_id"), type: "removed" });
      }
    }
    if (data.can_send == 1) {
      Wo_SendMessages();
    }
  });
  }


  function Wo_RegisterPageLike(id) {
    element_like = $('[id=like-' + id + ']');
    html_like = '<button type="button" onclick="Wo_RegisterPageLike(' + id + ')" class="btn-active btn btn-default btn-sm wo_following_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg><span class="button-text"> Liked</span></button>';
    if (element_like.find('button').hasClass('btn-active')) {
      html_like = '<button type="button" onclick="Wo_RegisterPageLike(' + id + ')" class="btn btn-default btn-sm wo_follow_btn" id="wo_useract_btn"><i class="fa fa-heart-o" style="font-size: 20px"></i></button>';
    }
    element_like.html(html_like);
    $.get(Wo_Ajax_Requests_File(), {f: 'like_page', page_id: id}, function (data) {
      if(data.status == 200) {
        if (node_socket_flow == "1") {
          if (element_like.find('button').hasClass('btn-active')) {
           socket.emit("page_notification", { to_id: id, user_id: _getCookie("user_id"), type: "added"});
         } else {
          socket.emit("page_notification", { to_id: id, user_id: _getCookie("user_id"), type: "removed"});
        }
      }
      if ($('.sidebar-listed-page-like').attr('data-type') == "sidebar") {
        setTimeout(function () {
          Wo_ReloadSideBarPages();
        }, 500);
      }
    }
    if (data.can_send == 1) {
      Wo_SendMessages();
    }
  });
  }

  function Wo_RegisterLike(post_id) {
    var post = $('[id=post-' + post_id + ']');
    html_like = '<span class="active-like"><i class="fa fa-heart" style="font-size: 20px; color: green"></i></span>';
    if (post.find("[id^=like-button]").parent().find('.active-like').length > 0) {
      html_like = '<i class="fa fa-heart-o" style="font-size: 20px"></i>';
    }
    post.find("[id^=wonder-button]").html('<i class="fa fa-heartbeat" style="font-size: 20px"></i></span>');
    post.find("[id^=like-button]").html(html_like);
    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'register_like', post_id: post_id}, function (data) {
      if (post.find("[id^=like-button]").parent().find('.active-like').length > 0) {
        if (node_socket_flow == "1") { socket.emit("post_notification", { post_id: post_id, user_id: _getCookie("user_id"), type: "added" }); }
      } else {
        if (node_socket_flow == "1") { socket.emit("post_notification", { post_id: post_id, user_id: _getCookie("user_id"), type: "removed" });}
      }
      if(data.status == 200) {
        post.find("[id^=likes]").text(data.likes);
        post.find("[id^=wonders]").text(data.wonders);
      } else {
        post.find("[id^=likes]").text(data.likes);
        post.find("[id^=wonders]").text(data.wonders);
      }
      if (data.can_send == 1) {
        Wo_SendMessages();
      }
    });
  }

  function Wo_RegisterWonder(post_id) {
    var post = $('[id=post-' + post_id + ']');
    wonder_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="prc-feather prc-feather-thumbs-down"><path d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17"></path></svg>';
    wonder_lang = "Wonder";
    wonder_lang_2 = "Wondered";
    wonder_lang = "Dislike";
    wonder_lang_2 = "Disliked";
    html_wonder = '<span class="active-wonder"><i class="fa fa-heartbeat" style="font-size: 20px; color: red"></i></span>';
    if (post.find("[id^=wonder-button]").parent().find('.active-wonder').length > 0) {
      html_wonder = '<span class="like-btn-mobile"><i class="fa fa-heartbeat" style="font-size: 20px"></i></span>';
    }
    post.find("[id^=wonder-button]").html(html_wonder);
    post.find("[id^=like-button]").html('<i class="fa fa-heart-o" style="font-size: 20px"></i></span>');
    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'register_wonder', post_id: post_id}, function (data) {
      if (post.find("[id^=wonder-button]").parent().find('.active-wonder').length > 0) {
        if (node_socket_flow == "1") { socket.emit("post_notification", { post_id: post_id, user_id: _getCookie("user_id"), type: "added" }); }
      } else {
        if (node_socket_flow == "1") { socket.emit("post_notification", { post_id: post_id, user_id: _getCookie("user_id"), type: "removed" });}
      }
      if(data.status == 200) {
        post.find("[id^=wonders]").text(data.wonders);
        post.find("[id^=likes]").text(data.likes);
      } else {
        post.find("[id^=wonders]").text(data.wonders);
        post.find("[id^=likes]").text(data.likes);
      }
      if (data.can_send == 1) {
        Wo_SendMessages();
      }
    });
  }
  function Wo_IsLangValid(lang){
    var langs = [ "en", "tr","fr","es","nl","de","it","pt","ru","ar"];
    if (lang && langs.indexOf(lang) != -1) {
      return true;
    }
    else{
      return false;
    }
  }
  function Wo_DetectTextLang(text){
    var lcode = false;
    if (text || typeof(text) == 'string') {
      guessLanguage.info(text, function(lang) {
        lcode = lang[0];
      });
    }
    return lcode;
  }
  function Wo_Translate(id,lang){
    if (!id || !lang && Wo_IsLangValid(lang)) {
      return false;
    }else{
      var translatable_text = $("[data-translate-text="+id+"]").text();
      if (lang == Wo_DetectTextLang(translatable_text)) {
        $("[data-trans-btn=" + id + "]").removeAttr('onclick')
        return false;
      }
      $.ajax({
        url: 'https://translate.yandex.net/api/v1.5/tr.json/translate',
        type: 'GET',
        dataType: 'json',
        data: {
          key:'trnsl.1.1.20170601T212421Z.5834b565b8d47a18.2620528213fbf6ee3335f750659fc342e0ea7923',
          text:String(translatable_text),
          lang:String(lang)},
        }).done(function(data) {
          if (data.code == 200) {
            $("[data-translate-text="+id+"]").text(data.text[0])
            $("[data-trans-btn=" + id + "]").removeAttr('onclick')
          }
        }).fail(function() {
          console.log("translation error");
        })
      }
    }

    $(document).on('click', '#night_mode_toggle', function(event) {
      mode = $(this).attr('data-mode');
      if (mode == 'night') {
        $('head').append('<link rel="stylesheet" href="{{env('HOME_URL')}}/themes/wowonder/stylesheet/dark.css" id="night-mode-css">');
        $('#night_mode_toggle').attr('data-mode', 'day');
        $('#night-mode-text').text('Day mode');
      } else {
        $('#night-mode-css').remove();
        $('#night_mode_toggle').attr('data-mode', 'night');
        $('#night-mode-text').text('Night mode');
      }
      $.post(Wo_Ajax_Requests_File() + '?mode=' + mode);
    });

    $(document).on('click', '#share_post_on_btn', function(event) {
      text = $('#share_post_text').val();
      type = $('#SearchForInputType').val();
      post_id = $('#SearchForInputPostId').val();
      type_id = $('#SearchForInputTypeId').val();
      self = this;
      $(this).text('Please wait..');
      $(this).attr('disabled', 'true');
      $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'share_post_on',s:type,type_id:type_id,post_id:post_id,text:text},
      })
      .done(function(data) {
        if (node_socket_flow == "1") {
          socket.emit("post_notification", { post_id: post_id, user_id: _getCookie("user_id")});
        }
        $(self).text('Share');
        $(self).removeAttr('disabled');
        if (data.status == 200) {
          $('.share_post_modal_alert').html('<div class="alert alert-success">Post has been successfully shared.</div>');

          setTimeout(function () {
            $('#share_post_modal').modal('hide');
          },2000);
        }
        else{
          $('.share_post_modal_alert').html("<div class='alert alert-danger'>You can&#039;t share a post on a page or a Friends Club that is your not own.</div>");
          setTimeout(function () {
            $('.share_post_modal_alert').html('');
          },2000);
        }
      })
      .fail(function() {
      })
      .always(function() {
      });
    });

    $(document).on('change', '#share_type_select', function(event) {
      var type = $(this).val();
      if (type == 'user') {
        $('.search_for_form').hide(400);
        $('#type_user_name').show(400);
        $('#SearchForInputType').val('user');
      }
      else if(type == 'page'){
        $('.search_for_form').hide(400);
        $('#type_page_name').show(400);
        $('#SearchForInputType').val('page');
      }
      else if(type == 'group'){
        $('.search_for_form').hide(400);
        $('#type_group_name').show(400);
        $('#SearchForInputType').val('group');
      }
      else if(type == 'timeline'){
        $('.search_for_form').hide(400);
        $('#SearchForInputType').val('timeline');
      }
    });

  // $(document).on('click', '#share_post_on_page_form_btn', function(event) {
  //   page_id = $('#SearchForInputPage').val();
  //   post_id = $('#SearchForInputPostIdPage').val();
  //   $.ajax({
  //     url: Wo_Ajax_Requests_File(),
  //     type: 'GET',
  //     dataType: 'json',
  //     data: {f: 'share_post_on',s:'page',page_id:page_id,post_id:post_id},
  //   })
  //   .done(function() {
  //   })
  //   .fail(function() {
  //   })
  //   .always(function() {
  //   });

  // });
  // $(document).on('click', '#share_post_on_user_form_btn', function(event) {
  //   user_id = $('#SearchForInputUser').val();
  //   post_id = $('#SearchForInputUserPostId').val();
  //   $.ajax({
  //     url: Wo_Ajax_Requests_File(),
  //     type: 'GET',
  //     dataType: 'json',
  //     data: {f: 'share_post_on',s:'user',user_id:user_id,post_id:post_id},
  //   })
  //   .done(function() {
  //   })
  //   .fail(function() {
  //   })
  //   .always(function() {
  //   });

  // });


  function Wo_LoadViewsInfo(self) {
    $('#load_more_info_btn').html('Please wait..');
    var type = $(self).attr('data-type');
    var table = $(self).attr('table-type');
    var post_id = $(self).attr('post-id');
    var id   = $('.views_info_count').last().attr('data-row-id');
    var request = '';
    if (type == 'like') {
      request = 'get_post_likes';
    }
    if (type == 'wonder') {
      request = 'get_post_wonders';
    }
    if (type == 'share') {
      request = 'get_post_shared';
    }
    $.get(Wo_Ajax_Requests_File(), {
      f: 'posts',
      s: request,
      type:type,
      post_id: post_id,
      offset: id,
      table:table
    }, function (data) {
      if(data.status == 200) {
        if(data.html.length == 0) {
          $(self).css('display', 'none');
        } else {
          $('#views_info').append(data.html);
          $('#load_more_info_btn').html('Load more');
        }
      }
      $('#load_more_info_btn').html('Load more');
    });
  }

  function Wo_LoadReactedUsers(type) {
    $('#reacted_users_box').html('<div class="prc-lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div>');
    var post_id = $('.reacted_users_load_more').attr('post-id');
    var col = $('.reacted_users_load_more').attr('col-type');
    $.get(Wo_Ajax_Requests_File(), {
      f: 'posts',
      s: 'get_post_reacted',
      type:type,
      post_id: post_id,
      col:col
    }, function (data) {
      if(data.status == 200) {
        if(data.html.length == 0) {
          $('.reacted_users_load_more').css('display', 'none');
          $('.reacted_users_load_more').attr('data-type', '');
          $('#reacted_users_box').html('<span class="view-more-wrapper text-center">' + data.message + '</span>');
        } else {
          $('.reacted_users_load_more').attr('data-type', type);
          $('.reacted_users_load_more').attr('post-id', post_id);
          $('.reacted_users_load_more').attr('col-type', col);
          $('#load_more_reacted_btn').html('Load more');
          $('.reacted_users_load_more').css('display', 'inline');
          $('#reacted_users_box').html(data.html);
        }
      }
    //$('#load_more_info_btn').html('Load more');
  });
  }

  function Wo_LoadMoreReactedUsers(self) {
    $('.reacted_users_load_more').find('#load_more_reacted_btn').html('Please wait..');
    var type = $(self).attr('data-type');
    var post_id = $(self).attr('post-id');
    var id   = $('.views_info_count').last().attr('data-row-id');
    var col = $('.reacted_users_load_more').attr('col-type');
    var request = 'get_post_reacted';
    $.get(Wo_Ajax_Requests_File(), {
      f: 'posts',
      s: request,
      type:type,
      post_id: post_id,
      offset: id,
      col:col
    }, function (data) {
      if(data.status == 200) {
        if(data.html.length == 0) {
          $(self).css('display', 'none');
        } else {
          $('#reacted_users_box').append(data.html);
          $('.reacted_users_load_more').find('#load_more_reacted_btn').html('Load more');
        }
      }
      $('.reacted_users_load_more').find('#load_more_reacted_btn').html('Load more');
    });
  }

  function Wo_SortComments(type,post_id) {
    if (type == 'top') {
      $('.order-text-'+post_id).text('Top');
    }
    else{
      $('.order-text-'+post_id).text('Latest');
    }
    main_wrapper = $('#post-' + post_id);
    view_more_wrapper = main_wrapper.find('.view-more-wrapper');
    Wo_progressIconLoader(view_more_wrapper);
    $('#post-' + post_id).find('.view-more-wrapper .ball-pulse').fadeIn(100);
    $.get(Wo_Ajax_Requests_File(), {
      f: 'posts',
      s: 'load_more_comments_sort',
      post_id: post_id,
      type: type
    }, function (data) {
      if(data.status == 200) {
        main_wrapper.find('.comments-list').html(data.html);
        $('.ball-pulse-'+post_id).fadeOut('100');
      }
    });
  }

  function count_char(self,id) {
  }

  function ApplyJobNow(job_id) {
    $.post(Wo_Ajax_Requests_File()+'?f=job&s=get_apply_modal', {job_id: job_id}, function(data, textStatus, xhr) {
      if (data.status == 200) {
        $('#apply-job-modal').html(data.html);
        $('#apply-job-modal').modal('show');
      }
    });
  }

  $(document).on('change', '#i_currently_work', function(event) {
    if ($('#i_currently_work').is(":checked")) {
      $('#experience_end_date').css('display', 'none');
    }
    else{
      $('#experience_end_date').css('display', 'block');
    }
  });



  function Wo_GetPaymentMethods(self) {
    var amount = $('#fund_donate_amount').val();
    var fund_id = $('#fund_donate_id').val();
    if (!amount || !fund_id) {
      $('#fund_donate_amount').attr('style', 'border-color: red !important');
      return false;
    }
    $('#fund_donate_amount').attr('style', 'border-color: unset');
    $(self).attr('disabled', 'true');
    $.get(Wo_Ajax_Requests_File() + '?f=funding&s=get_payment_donate_method&fund_id=' + fund_id + '&amount=' + amount, function (data) {
      if (data.status == 200) {
        $('#donate_for_fund_modal').html(data.html);
        $('#dont_modal').modal('hide');
        $('#fund_payment_donate_modal').modal({
         show: true
       });
      }
      else{
        $('#amount_fund_alert').html('<div class="alert alert-danger">' + data['message'] + '</div>');
        setTimeout(function (argument) {
          $('#amount_fund_alert').html('');
        },2000);
      }
      $(self).removeAttr('disabled');
    });
  }

  function Wo_GetPayPalDonateLink(fund_id,amount) {
    if (!amount || !fund_id) {
      return false;
    }

    $('.btn-paypal').attr('disabled', true).text("Please wait..");
    $.post(Wo_Ajax_Requests_File() + '?f=funding&s=get_paypal_url', {fund_id:fund_id,amount:amount}, function(data) {
      if (data.status == 200) {
        window.location.href = data.url;
      } else {
        $('.btn-paypal').attr('disabled', false).html("PayPal App not set yet.");
      }
    });
  }

  function Wo_StripeDonate(fund_id,amount,type = 'credit_card') {
    if (!amount || !fund_id) {
      return false;
    }

    if (type == 'credit_card') {
      $('.btn-cart').attr('disabled', true).text("Please wait..");
    }
    else{
      $('.btn-alipay').attr('disabled', true).text("Please wait..");
    }
    var stripe = Stripe('');
    $.post(Wo_Ajax_Requests_File() + '?f=stripe&s=session', {amount: amount,type:'fund',fund_id:fund_id,payment_type:type}, function(data, textStatus, xhr) {
      if (data.status == 200) {
        return stripe.redirectToCheckout({ sessionId: data.sessionId });
      }
    });
  }

  function Wo_BankTransferDonate(fund_id,amount) {
    if (!amount || !fund_id) {
      return false;
    }

    $('.bank_payment').attr('disabled', true).text("Please wait..");

    $('#configreset').click();
    $(".prv-img").html('<div class="thumbnail-rendderer"><div><h4 class="bold">Drop Image Here</h4><div class="error-text-renderer"></div><div><span>OR</span><p>Browse To Upload</p></div></div> </div>');
    $("#blog-alert").html('');
    $('#bank_donate_price').val(amount);
    $('#bank_donate_fund_id').val(fund_id);
    $('#pay-go-pro').modal('hide');
    $('#bank_transfer_donate_modal').modal({
     show: true
   });
  }

  function Wo_BitcoinDonate(fund_id,amount) {
    if (!amount || !fund_id) {
      return false;
    }

    $('.btn-bitcoin').attr('disabled', true).text("Please wait..");
    $('#pay-go-pro').modal('hide');
    $.get(Wo_Ajax_Requests_File() + '?f=donate_with_bitcoin&amount=' + amount+"&fund_id="+fund_id, function (data) {
      if (data.status == 200) {
        $(data.html).appendTo('body').submit();
      }
    });
  }




  function Wo_CheckOutCardDonate(fund_id,amount) {
    if (!amount || !fund_id) {
      return false;
    }

    $('.btn-check').attr('disabled', true).text("Please wait..");
    $('#donate_check_amount').val(amount)
    $('#donate_check_fund_id').val(fund_id)

    $("#2checkout_alert_donate_wallet").html('');
    $('#pay-go-pro').modal('hide');
    $('#2checkout_wallet_donate_modal').modal({
      show: true
    });

  }
  function openInNewTab(url, id) {
   var myWindow = window.open(url, "", "width=600,height=700");
   return false;
  }

  function Wo_LiveComment(text,event,post_id,insert = 0) {
    text = $('[id=post-' + post_id + ']').find('.comment-textarea').val();
    if (text && (event.keyCode == 13 || insert == 1)) {
      if ($('#live_post_comments_'+post_id+' .live_comments').length >= 4) {
        $('#live_post_comments_'+post_id+' .live_comments').first().remove();
      }
      $('#live_post_comments_'+post_id).append('<div class="live_comments" live_comment_id=""><a class="pull-left" href="{{env('HOME_URL')}}/admin"><img class="prc-live_avatar pull-left" src="{{env('HOME_URL')}}/upload/photos/d-avatar.jpg?cache=0" alt="avatar"></a><div class="comment-body" style="float: left;"><div class="comment-heading"><span><a href="{{env('HOME_URL')}}/admin" data-ajax="?link1=timeline&amp;u=admin" ><h4 class="live_user_h"> Salim Khan </h4></a></span><span class="verified-color" data-toggle="tooltip" title="Verified User"><i class="fa fa-check-circle"></i></span><div class="comment-text">'+text+'</div></div></div><div class="clear"></div></div>');

    }
  }
  function Wo_ReplyChatMessage(chat_id,id) {
    $('.message_reply_id_'+chat_id).val(id);
    $('.message_reply_text_'+chat_id+' span').find('.reply_content').remove();
    if ($("#message_text_reply_"+id).length > 0 && $("#message_text_reply_"+id).html() != '') {
      $('.message_reply_text_'+chat_id+' span').prepend('<p class="reply_content">'+$("#message_text_reply_"+id).html()+'</p>')
    }
    else if($('#message_media_reply_'+id).length > 0 && $('#message_media_reply_'+id).find('img').length > 0){
      $('.message_reply_text_'+chat_id+' span').prepend('<div class="message-user-image pull-left reply_content"><img src="'+$('#message_media_reply_'+id).find('img').attr('src')+'" alt="User image"></div>')
    }
    $('.message_reply_text_'+chat_id).fadeIn(50);
  }
  function Wo_ClearReplyChatMessage(chat_id) {
    $('.message_reply_id_'+chat_id).val(0);
    $('.message_reply_text_'+chat_id).find('.reply_content').remove();
    $('.message_reply_text_'+chat_id).fadeOut(50);
  }
  function Wo_ReplyMessage(id) {
    $('.message_reply_id').val(id);
    $('.message_reply_text span').find('.reply_content').remove();
    if ($("#message_text_reply_"+id).length > 0 && $("#message_text_reply_"+id).html() != '') {
      $('.message_reply_text span').prepend('<p class="reply_content">'+$("#message_text_reply_"+id).html()+'</p>')
    }
    else if($('#message_media_reply_'+id).length > 0 && $('#message_media_reply_'+id).find('img').length > 0){
      $('.message_reply_text span').prepend('<div class="message-user-image reply_content"><img src="'+$('#message_media_reply_'+id).find('img').attr('src')+'" alt="User image"></div>')
    }
    $('.message_reply_text').fadeIn(50);
  }
  function Wo_ClearReplyMessage() {
    $('.message_reply_id').val(0);
    $('.message_reply_text').find('.reply_content').remove();
    $('.message_reply_text').fadeOut(50);
  }
  $(window).on('load', function() {
  //reactions
  $('body').delegate('.wo-reaction-post','mouseenter', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      if ($('#post-' + id + ' .wo-reaction-post:hover').length != 0) {
        $('.reactions-box-container-'+id).fadeIn(50);
      }
    }, 300);
  });
  $('body').delegate('.like-story-lightbox','click', function() {
    var id = $( this ).attr( 'data-story-id' );
    setTimeout( function () {
      $('.reactions-box-story-container-'+id).fadeIn(50);
    }, 300);
  });
  $('body').delegate('.like-story-lightbox','mouseleave', function() {
    var id = $( this ).attr( 'data-story-id' );
    setTimeout( function () {
      $('.reactions-box-story-container-'+id).fadeOut(50);
    }, 1000);
  });
  $('body').delegate('.messages-reactions','click', function() {
    var id = $( this ).attr( 'data-message-id' );
    setTimeout( function () {
      $('.reactions-box-container-'+id).fadeIn(50);
    }, 300);
  });
  $('body').delegate('.messages-reactions','mouseleave', function() {
    var id = $( this ).attr( 'data-message-id' );
    setTimeout( function () {
      if ($('.reactions-box-container-'+id + ':hover').length == 0) {
        $('.reactions-box-container-'+id).fadeOut(50);
      }
    }, 500);
  });

  $('body').delegate('.wo-reaction-post','mouseleave', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      if ($('.reactions-box-container-'+id + ':hover').length == 0 && $('#post-' + id + ' .wo-reaction-post:hover').length == 0) {
        $('.reactions-box-container-'+id).fadeOut(50);
      }
    }, 500);
  });

  $('body').delegate('.like-btn-post','click', function() {
    if ($( this ).attr( 'data_react' ) == 0) {
      return false;
    }
    var self = this;
    var post_id = $( this ).attr( 'data-id' );

    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'delete_reaction', post_id: post_id}, function (data) {
      if(data.status == 200) {
        $('.reactions-box-container-'+post_id).toggle();
        $('.post-reactions-icons-'+post_id).html(data.reactions);
        $('.status-reaction-'+post_id).removeClass("active-like");
        $('.status-reaction-'+post_id).html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="prc-feather prc-feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg> ' + data.like_lang).css({"color": "inherit"});
      }
      $(self).attr('data_react','0');
    });
  });

  $('body').delegate('.reactions-box','mouseleave', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      if ($('.reactions-box-container-'+id + ':hover').length == 0 && $('#post-' + id + ' .wo-reaction-post:hover').length == 0) {
        $('.reactions-box-container-'+id).fadeOut(50);
      }
    }, 500);
  });

  //reactions lightbox
  $('body').delegate('.wo-reaction-lightbox','mouseenter', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      if ($('#post-' + id + ' .wo-reaction-lightbox:hover').length != 0) {
        $('.reactions-lightbox-container-'+id).fadeIn(50);
      }
    }, 500);
  });

  $('body').delegate('.wo-reaction-lightbox','mouseleave', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      if ($('.reactions-lightbox-container-'+id + ':hover').length == 0 && $('#post-' + id + ' .wo-reaction-lightbox:hover').length == 0) {
        $('.reactions-lightbox-container-'+id).fadeOut(50);
      }
    }, 500);
  });

  $('body').delegate('.like-btn-lightbox','click', function() {
    var post_id = $( this ).attr( 'data-id' );

    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'delete_reaction', post_id: post_id}, function (data) {
      if(data.status == 200) {
       $('.reactions-lightbox-container-'+post_id).toggle();
       $('.post-reactions-icons-'+post_id).html("");
       $('.status-reaction-'+post_id).removeClass("active-like");
       $('.status-reaction-'+post_id).html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="prc-feather prc-feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>' + data.like_lang).css({"color": "inherit"});
     }
   });
  });

  //reactions comment
  $('body').delegate('.like-btn-comment','mouseenter', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      $('.reactions-comment-container-'+id).fadeIn(50);
    }, 500);
  });

  $('body').delegate('.like-btn-comment','mouseleave', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      if( $('.reactions-comment-container-'+id+':hover').length == 0 && $('#comment-' + id + ' .wo-reaction-comment:hover').length == 0 ){
        $('.reactions-comment-container-'+id).fadeOut(50);
      }
    }, 500);
  });

  $('body').delegate('.reactions-box','mouseleave', function() {
    if( !$( this ).hasClass( 'reactions-comment-container-' + $( this ).attr( 'data-id' ) ) ){
      return false;
    }
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      $('.reactions-comment-container-'+id).fadeOut(50);
    }, 500);
  });

  $('body').delegate('.like-btn-comment','click', function() {
    var comment_id = $( this ).attr( 'data-id' );

    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'delete_comment_reaction', comment_id: comment_id}, function (data) {
      if(data.status == 200) {
        $('.reactions-comment-container-'+comment_id).toggle();
        $('.comment-reactions-icons-'+comment_id).html(data.reactions);
        $('.comment-status-reaction-'+comment_id).removeClass("active-like");
      }
    });
  });

  //reactions replay
  $('body').delegate('.like-btn-replay','mouseenter', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      $('.reactions-box-comment-replay-container-'+id).fadeIn(50);
    }, 500);
  });
  $('body').delegate('.reactions-box','mouseenter', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      $('.reactions-box-comment-replay-container-'+id).fadeIn(50);
    }, 500);
  });

  $('body').delegate('.like-btn-replay','mouseleave', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      if( $('.reactions-comment-replay-container-'+id+':hover').length == 0 && $('#comment_reply_' + id + ' .wo-reaction-replay:hover').length == 0 ){
        $('.reactions-box-comment-replay-container-'+id).fadeOut(50);
      }
    }, 500);
  });

  $('body').delegate('.reactions-box','mouseleave', function() {
    if( !$( this ).hasClass( 'reactions-box-comment-replay-container-' + $( this ).attr( 'data-id' ) ) ){
      return false;
    }
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      $('.reactions-box-comment-replay-container-'+id).fadeOut(50);
    }, 500);
  });

  $('body').delegate('.like-btn-replay','click', function() {
    var replay_id = $( this ).attr( 'data-id' );

    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'delete_replay_reaction', replay_id: replay_id}, function (data) {
      if(data.status == 200) {
        if (node_socket_flow == "1") {
          socket.emit("reply_notification", { reply_id: replay_id, user_id: _getCookie("user_id"), type: "removed" });
        }
        $('.reactions-box-comment-replay-container-'+replay_id).toggle();
        $('.replay-reactions-icons-'+replay_id).html(data.reactions);
        $('.replay-status-reaction-'+replay_id).removeClass("active-like");
      }
    });
  });


  //reactions comment lightbox
  $('body').delegate('.like-btn-lightbox-comment','mouseenter', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      $('.reactions-lightbox-comment-container-'+id).fadeIn(50);
    }, 500);
  });

  $('body').delegate('.like-btn-lightbox-comment','mouseleave', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      if( $('.reactions-lightbox-comment-container-'+id+':hover').length == 0 && $('#comment_' + id + ' .wo-reaction-lightbox-comment:hover').length == 0 ){
        $('.reactions-lightbox-comment-container-'+id).fadeOut(50);
      }
    }, 500);
  });

  $('body').delegate('.reactions-box','mouseleave', function() {
    if( !$( this ).hasClass( 'reactions-lightbox-comment-container-' + $( this ).attr( 'data-id' ) ) ){
      return false;
    }
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      $('.reactions-lightbox-comment-container-'+id).fadeOut(50);
    }, 500);
  });

  $('body').delegate('.like-btn-lightbox-comment','click', function() {
    var comment_id = $( this ).attr( 'data-id' );

    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'delete_comment_reaction', comment_id: comment_id}, function (data) {
      if(data.status == 200) {
        $('.reactions-box-comment-replay-container-'+comment_id).toggle();
        $('.lightbox-comment-reactions-icons-'+comment_id).html(data.reactions);
        $('.lightbox-comment-status-reaction-'+comment_id).removeClass("active-like");
      }
    });
  });

  });
  function ProcessingVideo(id) {
    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'processing_video', post_id: id}, function (data) {
      $('.processing_alert_'+id).remove();
    });
  }
  function SendSeen(recipient_id) {
    var chat_container = $('.chat-tab').find('.chat_main_'+recipient_id);
    var last_id = chat_container.find('.messages-text:last').attr('data-message-id');
    $.post( Wo_Ajax_Requests_File() + '?f=chat&s=seen&hash=' + $('.main_session').val(), {recipient_id: recipient_id}, function(data, textStatus, xhr) {});
  }
  </script>      <!-- Audio FILES -->
  <audio id="notification-sound" class="sound-controls" preload="auto">
   <source src="{{env('HOME_URL')}}/themes/wowonder/mp3/New-notification.mp3" type="audio/mpeg">
   </audio>
   <audio id="message-sound" class="sound-controls" preload="auto">
     <source src="{{env('HOME_URL')}}/themes/wowonder/mp3/New-message.mp3" type="audio/mpeg">
     </audio>
     <audio id="calling-sound" class="sound-controls" preload="auto">
       <source src="{{env('HOME_URL')}}/themes/wowonder/mp3/calling.mp3" type="audio/mpeg">
       </audio>
       <audio id="video-calling-sound" class="sound-controls" preload="auto">
         <source src="{{env('HOME_URL')}}/themes/wowonder/mp3/video_call.mp3" type="audio/mpeg">
         </audio>

         <!-- End 'Audio FILES' -->
         <script>
          let f = navigator.userAgent.search("Firefox");
          if (f > -1) {
            $('.prc-header-brand').attr('href', "{{env('HOME_URL')}}/?cache=1632496223");
          }
          function ShowCommentGif(id,type) {
            $( ".gif_post_comment" ).each(function( index ) {
             if ($( this ).attr('id') != 'gif-form-'+id) {
              $( this ).slideUp();
            }
          });
            $('#gif-form-'+id).slideToggle(200);
            $('.gif_post_comment_gif').html('');
          }
          function SearchForGif(keyword,id = 0,type = '') {
            $('#publisher-box-stickers-cont-'+id).empty();
            Wo_Delay(function(){
              $.ajax({
                url: 'https://api.giphy.com/v1/gifs/search?',
                type: 'GET',
                dataType: 'json',
                data: {q:keyword,api_key:'420d477a542b4287b2bf91ac134ae041', limit: 20},
              })
              .done(function(data) {
                if (data.meta.status == 200 && data.data.length > 0) {
                  var appended = false;
                  for (var i = 0; i < data.data.length; i++) {
                    appended = true;
                    if (appended == true) {
                      appended = false;
                      if (type == 'story') {
                       $('#publisher-box-stickers-cont-'+id).append($('<img alt="gif" src="'+data.data[i].images.fixed_height_small.url+'" data-gif="' + data.data[i].images.fixed_height.url + '" onclick="Wo_PostCommentGif_'+id+'(this,'+id+')" autoplay loop>'));
                     }
                     else{
                       $('#publisher-box-stickers-cont-'+id).append($('<img alt="gif" src="'+data.data[i].images.fixed_height_small.url+'" data-gif="' + data.data[i].images.fixed_height.url + '" onclick="Wo_PostReplyCommentGif_'+id+'(this,'+id+')" autoplay loop>'));
                     }
                     appended = true;
                   }
                 }
                 var images = 0;
                 Wo_ElementLoad($('img[alt=gif]'), function(){
                  images++;
                });
                 if (data.data.length == images || images >= 5) {

                 }
               }
               else{
                 $('#publisher-box-stickers-cont-'+id).html('<p class="no_gifs_found"><i class="fa fa-frown-o"></i> No result to show</p>');
               }
             })
              .fail(function() {
                console.log("error");
              })
            },100);
          }
          function ShowCommentStickers(id,type) {
            $('.gif_post_comment').slideUp(200);
            $('.gif_post_comment_gif').html('');
            $('#sticker-form-'+id).slideToggle(200);
            $('.chat-box-stickers-cont').empty();
            functionName = "Wo_PostReplyCommentSticker_"+id+"(this,"+id+");";
            if (type == 'story') {
              functionName = "Wo_PostCommentSticker_"+id+"(this,"+id+");";
            }

            sticker = '<img alt="gif" src="{{env('HOME_URL')}}/upload/photos/2021/09/D2LTCWb4S7pU5zfBVuHC_05_11aa4f7de0df52c842cf9eb56ffa99ee_image.png" data-gif="{{env('HOME_URL')}}/upload/photos/2021/09/D2LTCWb4S7pU5zfBVuHC_05_11aa4f7de0df52c842cf9eb56ffa99ee_image.png" onclick="'+functionName+'" autoplay loop><img alt="gif" src="{{env('HOME_URL')}}/upload/photos/2021/09/ZpHMJHn5s9ucWoO1fRkk_05_4b5e2f5f3be17b685c8bfbf244f832a4_image.gif" data-gif="{{env('HOME_URL')}}/upload/photos/2021/09/ZpHMJHn5s9ucWoO1fRkk_05_4b5e2f5f3be17b685c8bfbf244f832a4_image.gif" onclick="'+functionName+'" autoplay loop><img alt="gif" src="{{env('HOME_URL')}}/upload/photos/2021/09/fnj6uXqEIvznmuXVqghJ_05_587b85c7c87733d25087b864eb7554d4_image.gif" data-gif="{{env('HOME_URL')}}/upload/photos/2021/09/fnj6uXqEIvznmuXVqghJ_05_587b85c7c87733d25087b864eb7554d4_image.gif" onclick="'+functionName+'" autoplay loop><img alt="gif" src="{{env('HOME_URL')}}/upload/photos/2021/09/FrkZoPHzRimkgQMvo6tC_05_3ca64cb890c7a87c04c9ca3b856f80a6_image.gif" data-gif="{{env('HOME_URL')}}/upload/photos/2021/09/FrkZoPHzRimkgQMvo6tC_05_3ca64cb890c7a87c04c9ca3b856f80a6_image.gif" onclick="'+functionName+'" autoplay loop><img alt="gif" src="{{env('HOME_URL')}}/upload/photos/2021/08/nmIDu5IWCDQRyhOei7c1_17_005ff123cad7756b86af487f00efb48f_image.gif" data-gif="{{env('HOME_URL')}}/upload/photos/2021/08/nmIDu5IWCDQRyhOei7c1_17_005ff123cad7756b86af487f00efb48f_image.gif" onclick="'+functionName+'" autoplay loop><img alt="gif" src="{{env('HOME_URL')}}/upload/photos/2021/08/Z8qTD6hX5rfCVXtYhKcH_17_33ebfac69e8c663832c8ff55f9efd5c1_image.gif" data-gif="{{env('HOME_URL')}}/upload/photos/2021/08/Z8qTD6hX5rfCVXtYhKcH_17_33ebfac69e8c663832c8ff55f9efd5c1_image.gif" onclick="'+functionName+'" autoplay loop>';
            $('#publisher-box-sticker-cont-'+id).html(sticker);

          }
          $(window).on("popstate", function (e) {
            location.reload();
          });
          /*Language Select*/
          $(document).ready(function(){
            $("#wo_language_modal .language_select .English").append('<span class="language_initial"><img src="{{env('HOME_URL')}}/themes/wowonder/img/flags/united-states.svg"/></span> ');
            $("#wo_language_modal .language_select .Arabic").append('<span class="language_initial"><img src="{{env('HOME_URL')}}/themes/wowonder/img/flags/saudi-arabia.svg"/></span> ');
            $("#wo_language_modal .language_select .Dutch").append('<span class="language_initial"><img src="{{env('HOME_URL')}}/themes/wowonder/img/flags/netherlands.svg"/></span> ');
            $("#wo_language_modal .language_select .French").append('<span class="language_initial"><img src="{{env('HOME_URL')}}/themes/wowonder/img/flags/france.svg"/></span> ');
            $("#wo_language_modal .language_select .German").append('<span class="language_initial"><img src="{{env('HOME_URL')}}/themes/wowonder/img/flags/germany.svg"/></span> ');
            $("#wo_language_modal .language_select .Hungarian, #wo_language_modal .language_select .Magyar").append('<span class="language_initial"><img src="{{env('HOME_URL')}}/themes/wowonder/img/flags/hungary.svg"/></span> ');
            $("#wo_language_modal .language_select .Italian").append('<span class="language_initial"><img src="{{env('HOME_URL')}}/themes/wowonder/img/flags/italy.svg"/></span> ');
            $("#wo_language_modal .language_select .Portuguese").append('<span class="language_initial"><img src="{{env('HOME_URL')}}/themes/wowonder/img/flags/portugal.svg"/></span> ');
            $("#wo_language_modal .language_select .Russian").append('<span class="language_initial"><img src="{{env('HOME_URL')}}/themes/wowonder/img/flags/russia.svg"/></span> ');
            $("#wo_language_modal .language_select .Spanish").append('<span class="language_initial"><img src="{{env('HOME_URL')}}/themes/wowonder/img/flags/spain.svg"/></span> ');
            $("#wo_language_modal .language_select .Serbian").append('<span class="language_initial"><img src="{{env('HOME_URL')}}/themes/wowonder/img/flags/serbia.svg"/></span> ');
            $("#wo_language_modal .language_select .Turkish").append('<span class="language_initial"><img src="{{env('HOME_URL')}}/themes/wowonder/img/flags/turkey.svg"/></span> ');
          });
        /*

  The code entered here will be added in <footer> tag

  */      </script>
  <script>
    window.addEventListener("load", function(){
      window.cookieconsent.initialise({
        "palette": {
          "popup": {
            "background": "#ffffff",
            "text": "#fff"
          },
          "button": {
            "background": "#0000ff"
          }
        },
        "theme": "edgeless",
        "content": {
          "message": "This website uses cookies to ensure you get the best experience on our website.",
          "dismiss": "Got It!",
          "link": "Learn More",
          "href": "{{env('HOME_URL')}}/terms/privacy-policy"
        }
      })});
    </script>

    <!-- // NEW STORY -->
    <script type="text/javascript">
     $(document).on('mouseover', '.story_lightbox', function(event) {
      $('.width_').css('width', $('.width_').css('width'));
      value = $(this).attr('data-post-id');
      $(this).addClass('dont_close_story_'+value);
    });
     $(document).on('mouseleave', '.story_lightbox', function(event) {
      Wo_Delay(function(){
        if ($('#users-reacted-modal').is(':hidden')) {
          value = $(this).attr('data-post-id');
          $(this).removeClass('dont_close_story_'+value);
          setTimeout(function(){
           $('.width_').css('width', '100%');
         }, 700);
          Wo_Delay(function(){
           if ($('.dont_close_story_'+value).length == 0) {
             $('.story_lightbox').find('.next-btn').click();
           }
         }, 10000);
        }
      }, 500);

    });
     $(document).on('click', '.story-image-wrapper', function(event) {
      event.preventDefault();
      $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="prc-lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');

      $value = $(this).parents(".story-container").attr('data-status-id');
      $.post(Wo_Ajax_Requests_File() + '?f=story_view', {id: $value}, function(data, textStatus, xhr) {
        if (data.status == 200) {
          document.body.style.overflow = 'hidden';
          $('.lightbox-container').html(data.html);
          $('.width_').addClass('load');
          setTimeout(function(){
            $('.width_').css('width', '100%');
          }, 200);
          Wo_Delay(function(){
            if ($('.dont_close_story_'+$value).length == 0) {
              Get_NextStory(data.story_id);
            }
          }, 10000);
        }
        else{
          Wo_CloseLightbox();
        }
      });
    });

     function Wo_GetMoreStoryViews(story_id,self) {
      last_view = $('.story_views_').last().attr('id');
      $(self).addClass('dont_close_story_'+story_id);
      $(self).find('span').html('Please wait..');
      $.post(Wo_Ajax_Requests_File() + '?f=story_views_', {last_view:last_view,story_id:story_id}, function(data, textStatus, xhr) {
        if (data.status == 200) {
          $(self).find('button').html('<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="prc-feather"><polyline points="6 9 12 15 18 9"></polyline></svg> Load more');

          $('.views_container_').append(data.html);
        }
        else{
          $(self).find('button').html('No more views');

        }
      });
    }
    $(document).on('click', '.see_all_stories', function(event) {
      event.preventDefault();
      $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="prc-lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
      user_id = $(this).attr('data_story_user_id');
      type = $(this).attr('data_story_type');
      $.post(Wo_Ajax_Requests_File() + '?f=view_all_stories', {user_id: user_id,type:type}, function(data, textStatus, xhr) {
        if (node_socket_flow == "1") {
         socket.emit("user_notification", { to_id: user_id, user_id: _getCookie("user_id"), type: "added" });
       }
       document.body.style.overflow = 'hidden';
       $('.lightbox-container').html(data.html);
       setTimeout(function(){
        video_story = $('#video_story').attr('data-story-video');
        if ($('[data-story-video='+video_story+']').length == 0) {

          $('.width_').addClass('load');
          setTimeout(function(){
            $('.width_').css('width', '100%');
          }, 200);
          Wo_Delay(function(){
            value = $('.user_story_').attr('id');

            if ($('.dont_close_story_'+value).length == 0) {
              if (type == 'user') {
                Get_NextStory(data.story_id);
              }
              else{

                Get_NextStory(data.story_id,'friends');
              }
            }
          }, 10000);
        }
      }, 200);
     });
    });
    function Get_PreviousStory(story_id,story_type = '') {
      if ($('.lightbox-container').is(":visible")) {

        Wo_CloseLightbox();
        $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="prc-lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
        $.post(Wo_Ajax_Requests_File() + '?f=view_story_by_id', {story_id: story_id,type:'previous',story_type:story_type}, function(data, textStatus, xhr) {
         user_id = $(this).attr('data_story_user_id');
         if (node_socket_flow == "1") {
           socket.emit("user_notification", { to_id: user_id, user_id: _getCookie("user_id"), type: "added" });
         }
         if (data.status == 200) {
          document.body.style.overflow = 'hidden';
          $('.lightbox-container').html(data.html);
          video_story = $('#video_story').attr('data-story-video');
          if ($('[data-story-video='+video_story+']').length == 0) {
            $('.width_').addClass('load');
            setTimeout(function(){
              $('.width_').css('width', '100%');
            }, 200);
            Wo_Delay(function(){
              value = $('.user_story_').attr('id');
              if ($('.dont_close_story_'+value).length == 0) {
                if (story_type == 'user') {
                  if ($('.lightpost-'+data.story_id).length > 0) {
                    Get_NextStory(data.story_id);
                  }
                }
                else{
                  if ($('.lightpost-'+data.story_id).length > 0) {
                    Get_NextStory(data.story_id,'friends');
                  }
                }
              }
            }, 10000);
          }
        }
        else{
          Wo_CloseLightbox();
        }
      });
      }
    }
    function Get_NextStory(story_id,story_type = '') {
      if ($('.lightbox-container').is(":visible")) {

        Wo_CloseLightbox();
        $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="prc-lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
        $.post(Wo_Ajax_Requests_File() + '?f=view_story_by_id', {story_id: story_id,type:'next',story_type:story_type}, function(data, textStatus, xhr) {
          if (data.status == 200) {
           user_id = $(this).attr('data_story_user_id');
           if (node_socket_flow == "1") {
             socket.emit("user_notification", { to_id: user_id, user_id: _getCookie("user_id"), type: "added" });
           }
           document.body.style.overflow = 'hidden';
           $('.lightbox-container').html(data.html);
           video_story = $('#video_story').attr('data-story-video');
           if ($('[data-story-video='+video_story+']').length == 0) {
            $('.width_').addClass('load');
            setTimeout(function(){
              $('.width_').css('width', '100%');
            }, 200);
            Wo_Delay(function(){
              value = $('.user_story_').attr('id');
              if ($('.dont_close_story_'+value).length == 0) {
                if (story_type == 'user') {
                  if ($('.lightpost-'+data.story_id).length > 0) {
                    Get_NextStory(data.story_id);
                  }
                }
                else{
                  if ($('.lightpost-'+data.story_id).length > 0) {
                    Get_NextStory(data.story_id,'friends');
                  }
                }
              }
            }, 10000);
          }
        }
        else{
          if (story_type == 'user') {
            if($('.unseen_story').length > 0){
              $('.unseen_story').addClass('seen_story');
              $('.unseen_story').removeClass('unseen_story');

            }
          }
          Wo_CloseLightbox();
        }
      });
      }
    }
    function Get_CurrentStory(story_id,story_type = '') {

      Wo_CloseLightbox();
      $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="prc-lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
      $.post(Wo_Ajax_Requests_File() + '?f=view_story_by_id', {story_id: story_id,type:'current',story_type:story_type}, function(data, textStatus, xhr) {
        if (data.status == 200) {
          user_id = $(this).attr('data_story_user_id');
          if (node_socket_flow == "1") {
           socket.emit("user_notification", { to_id: user_id, user_id: _getCookie("user_id"), type: "added" });
         }
         document.body.style.overflow = 'hidden';
         $('.lightbox-container').html(data.html);
         video_story = $('#video_story').attr('data-story-video');
         if ($('[data-story-video='+video_story+']').length == 0) {
          $('.width_').addClass('load');
          setTimeout(function(){
            $('.width_').css('width', '100%');
          }, 200);
          Wo_Delay(function(){
            value = $('.user_story_').attr('id');
            if ($('.dont_close_story_'+value).length == 0) {
              if (story_type == 'user') {
                if ($('.lightpost-'+data.story_id).length > 0) {
                  Get_NextStory(data.story_id);
                }
              }
              else{
                if ($('.lightpost-'+data.story_id).length > 0) {
                  Get_NextStory(data.story_id,'friends');
                }
              }
            }
          }, 10000);
        }
      }
      else{
        if (story_type == 'user') {
          if($('.unseen_story').length > 0){
            $('.unseen_story').addClass('seen_story');
            $('.unseen_story').removeClass('unseen_story');

          }
        }
        Wo_CloseLightbox();
      }
    });
    }
  </script>
  <!-- // NEW STORY -->

  <div class="modal fade sun_modal" id="apply-job-modal" role="dialog">
  </div>
  <!-- HTML NOTIFICATION POPUP -->
  <div id="notification-popup"></div>
  <!-- HTML NOTIFICATION POPUP -->


  <script src="{{env('HOME_URL')}}/themes/wowonder/layout/store/assets/slick.js"></script>
  <script>
    $(".cover-slider").slick({
      dots: false,
      infinite: true,
      speed: 600,
      slidesToShow: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
    });
  </script>

  <script>
    $('.new-products-slider').slick({
      dots: false,
      infinite: true,
      speed: 700,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });
  </script>

  <script>
    $('.best-sale-slider').slick({
      dots: false,
      infinite: true,
      speed: 700,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });
  </script>

  <script>
    $('.top-rated-slider').slick({
      dots: false,
      infinite: true,
      speed: 700,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });
  </script>

@stack('js')

