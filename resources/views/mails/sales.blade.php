
<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Sales Report By    <strong>{{$author}}</strong></title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */

      /*All the styling goes here*/

      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%;
      }
      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
      }
      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top;
      }
      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }
      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%;
      }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center;
      }
      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important;
        }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important;
        }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important;
        }
        table[class=body] .content {
          padding: 0 !important;
        }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important;
        }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important;
        }
        table[class=body] .btn table {
          width: 100% !important;
        }
        table[class=body] .btn a {
          width: 100% !important;
        }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important;
        }
      }
      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */

    </style>
  </head>
  <body class="">

<div class='container' text-align="center">
    {{-- <h3 class="panel-title navbar-brand">Detox House Party Ticket Confirmation!</h3> --}}


                 <div>

                 <!-- Main content -->
                  <section class="invoice">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-xs-12">
                        <h2 class="page-header">
                          <i class="fa fa-globe"></i> Sales Report By    <strong>{{$author}}</strong>

                        </h2>
                      </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      <div class="row invoice-info">
                        <div class="col-md-8 invoice-col">
                          <div class="product product-single">
                            <div class="product-thumb">
                              <!-- <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button> -->
                           <img src="<?php echo $message->embed($Wristband); ?>" alt="{{$Wristbandname}}" class="logo-text-light"/>

                            </div>
                             </div>
                        </div><!-- /.col -->


                      </div><!-- /.row -->
                      <div class="col-sm-6 invoice-col">
                        User information<hr>
                        <address>

                          customer:    {{$name}}<br>
                          Date:  {{$date}}<br>
                        </address>
                      </div><!-- /.col -->

                      <div class="col-sm-6 invoice-col">
                          Wristbands  information<hr>
                        <address>
                        Print Content:  {{$printcontent}}<br>
                        Colour     :     {{$colour}}      <br>
                        Wristband :      {{$Wristbandname}}     <br>
                          Quantity:    {{$Quantity}}<br>
                        Price          :   {{$price}}<br>

                        </address>
                      </div><!-- /.col -->


                      <div class="col-sm-6 invoice-col">
                          Stock Report For  Wristbands Quantity<hr>
                        <address>
                         Curent Stock:  {{$stock}}<br>
                        Previous Stock : {{$old}}
                        </address>
                      </div><!-- /.col -->
                    </div><!-- /.row -->

                 </div>

<!-- START FOOTER -->
<div class="footer">
  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td class="content-block">
        <img src="<?php echo $message->embed($img); ?>" alt="{{$app_name}}!" class="logo-text-light"/>
    <span class="apple-link">© 2020 {{$app_name}}. All rights reserved.</span>
       <!--  <br> Don't like these emails? <a href="http://i.imgur.com/CScmqnj.gif">Unsubscribe</a>. -->
      </td>
    </tr>
    <tr>
      <td class="content-block powered-by">
        Powered by <a href="http://wristbands.ng">Wristbands.ng</a>.
      </td>
    </tr>
  </table>
</div>
<!-- END FOOTER -->
</body>
</html>
