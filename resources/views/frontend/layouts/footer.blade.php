@php
    $setting=App\Models\Setting::first();
    $social=App\Models\Social::first();

    @endphp

<footer class="text-center text-lg-start text-dark bg-warning" >
          <!-- Grid container -->
          <div class="container p-4 pb-0">
            <!-- Section: Links -->
            <section class="">
              <!--Grid row-->
              <div class="row">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                  <h6 class="text-uppercase mb-4 font-weight-bold">
                    <img src="{{ asset($setting->logo) }}" class="logo rounded-3" alt="">
                    {{-- {{ $setting->projectName }} --}}
                  </h6>


                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none" />

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                  {{-- <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6> --}}
                  <p>
                    <i class="fas fa-home mr-3"></i>  {{ $setting->projectAddress }}
                  </p>



                </div>
                <!-- Grid column -->


                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">


                  <p><i class="fas fa-envelope mr-3"></i> {{ $setting->projectEmail }}</p>
                  <p><i class="fas fa-phone mr-3"></i> {{ $setting->projectPhone }}</p>
                  {{-- <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p> --}}
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                  {{-- <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6> --}}

                  <!-- Facebook -->
                  <a
                     class="btn btn-primary btn-floating m-1"
                     style="background-color: #3b5998"
                     href="{{ $social->facebook }}"
                     target="_blank"
                     role="button"
                     ><i class="fab fa-facebook-f"></i
                    ></a>

                    <!-- Linkedin -->
                  <a
                  class="btn btn-primary btn-floating m-1"
                  style="background-color: #0082ca"
                   href="{{ $social->linkedin }}"
                  target="_blank"
                  role="button"
                  ><i class="fab fa-linkedin-in"></i
                 ></a>


                  <a
                     class="btn btn-primary btn-floating m-1"
                     style="background-color: #333333"
                     href="#!"
                     role="button"
                     ><i class="fab fa-github"></i
                    ></a>
                </div>
              </div>
              <!--Grid row-->
            </section>
            <!-- Section: Links -->
          </div>
          <!-- Grid container -->

          <!-- Copyright -->

          <!-- Copyright -->
        </footer>
