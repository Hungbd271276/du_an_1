
  <footer>
    <div class="footer container-fluid text-center pt-5 mt-5  text-white">
      <div class="row" >
        <div class="col-xl-4 col-6  col-md-6 " style="margin-top: -40px;">
          <img width="150px" src="view/img/logo.png" alt="">
        </div>
        <div class="col-xl-4 col-6 col-md-6 " style="margin-top: -40px;">
          <p>Đ/c: Trịnh Văn Bô-Nam Từ Niêm-Hà Nội</p>
          <p>SĐT:0987654321</p>
          <p>Email:Barberstore@gmail.com</p>
        </div>
        <div class="col-xl-4 col-6 col-md-6 " style="margin-top: -40px;">
          <p>Kết nối với chúng tôi</p>
         <a href="#"> <img src="view/img/logo1.png" alt=""></a>
        <a href="#">  <img src="view/img/logo2.png" alt=""></a>
         <a href="#"> <img width = "30px" src="view/img/logo3.png"  alt=""></a>
        </div>
      </div>
    </div>
  </footer>
     <!-- jQuery and JS bundle w/ Popper.js -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>

    <script src="view/slick-master/slick/jquery-2.0.0.min.js"></script>
  <script src="view/slick-master/slick/slick.js"></script>

  <script>
    $('.variable').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  autoplay:2,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
$('.slider-area').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true,
  autoplay:2
});
  </script>
</body>
  </html>