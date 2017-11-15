    <!--
    <footer class="footer-page bg-orange">
      <div class="container">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2016 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </div>
    </footer>
    -->

    <footer class="footer-page white">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="widget">
              <h5 class="title-footer"><b>Kontak Kami</b></h5><br />
              <address class="col-sm-4">
                <strong class="sub-title-footer"><i class="fa fa-home pr-10"></i> Alamat</strong><br>
                <p>
                  Sekretariat Desa Sajen 2017 :<br>
                  Bagian Administrasi Desa Sajen<br>
                  Jln. A Yani Timur No. 37 Mojokerto
                </p>
              </address>
              <address class="col-sm-4">
                <strong class="sub-title-footer"><i class="fa fa-envelope pr-10"></i> E-mail : </strong>
                <p><a href="javascript:;" class="white">desa-sajen@gmail.com</a></p>
              </address>
              <address class="col-sm-4">
                <strong class="sub-title-footer"><i class="fa fa-phone pr-10"></i> Telephone</strong><br>
                <p>
                  1) Nursiyo : 08125xxxxxxx<br>
                  2) Sartono : 08213xxxxxxx
                </p>
              </address>
            </div>
          </div>
        </div>
        <div id="sub-footer">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="copyright">         
                  <span>Copyright &copy; <strong>Desa Sajen</strong> - 2017</span>
                  <span class="pull-right">
                    Develop and Design by <strong>HALTEC</strong></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="{{ asset('assets/pluggins/jQuery/jQuery-2.2.0.min.js') }}"></script>
    <script src="{{ asset('assets/pluggins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/pluggins/pgw-slideshow-master/pgwslideshow.min.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.pgwSlideshow').pgwSlideshow();
      });
    </script>
    @stack('public-script')
  </body>
</html>