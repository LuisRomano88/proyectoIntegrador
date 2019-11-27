<!-- NOTE: inicia footer -->
  <div class="container">
    <div class="row text-center text-xs-center text-sm-left text-md-left">
      <div id="aboutUs" class="col-12 col-sm-4 col-md-4">
        <h5>About Us</h5>
        <ul class="list-unstyled quick-links">
          <li><a href="home.php"></i>Home</a></li>
          <li><a href="catalog.php"></i>Catalog</a></li>
          <li><a href="faq.php"></i>FAQ</a></li>
        </ul>
      </div>
      <div id="socNetworks" class="col-12 col-sm-4 col-md-4">
        <h5>Social Networks</h5>
        <ul class="list-unstyled quick-links">
          <li><a href="https://www.facebook.com/" target="_blank">Facebook</a></li>
          <li><a href="https://www.instagram.com/" target="_blank"></i>Instagram</a></li>
          <li><a href="https://www.twitter.com/" target="_blank">Twitter</a></li>
        </ul>
      </div>
      <div id="contactUs" class="col-12 col-sm-4 col-md-4">
        <h5>Contact us</h5>
        <ul class="list-unstyled quick-links">
          <li><a class="nav-link active" href="#" data-toggle="modal" data-target="#formularioModal">Send us your questions</a>
            <!--- modal formulario --->
            <div class="modal fade" id="formularioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CONSULT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form id="fomulario">
                      <div class="row">
                        <div class="row">
                          <div class="col-10"><input class="form-control" id="nombre" type="text" placeholder="Name" required="Campo Obligatorio"></div>
                          <div class="col-10"><input class="form-control" id="apellido" type="text" placeholder="Lastname" required="required"></div>
                          <div class="col-10"><input class="form-control" id="mail" type="email" placeholder="E-mail" required></div>
                          <div class="col-10"><input class="form-control" id="tel" type="text" placeholder="Phone"></div>
                          <div class="col-10"><textarea class="form-control" id="txt" rows="20" type="text" placeholder="Consult" required></textarea></div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Send Message</button>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <!--- fin modal formulario --->
          <!--- modal ubicacion -->
          <li>
            <a id="linkLocation" class="nav-link" href="#" data-toggle="modal" data-target="#ubicacion">Location</a>
            <div class="modal fade" id="ubicacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LOCATION</h5>
                  </div>
                  <div class="modal-body">
                    <div id="ubicacion"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.947019831442!2d-68.84629968482672!3d-32.925997980927264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzLCsDU1JzMzLjYiUyA2OMKwNTAnMzguOCJX!5e0!3m2!1ses-419!2sar!4v1560388576285!5m2!1ses-419!2sar" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <!-- fin modal ubicacion --->
          <li>
            <a class="nav-link" href="#" data-toggle="modal" data-target="#info">Info</a>
            <!-- modal info --->
            <div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">INFO</h5>
                  </div>
                  <div class="modal-body">
                    <p id="datos">Opening hours: Monday - Friday from 8 to 18 h. Saturday from 8 to 14 h.</p>
                    <p id="datos">Phones: 0261-4525878 / 261-5789633</p>
                    <p id="datos">E-mail: consultas@tienda-online.com</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- finmodal info --->
          </li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
        <p><a href="https://www.digitalhouse.com/">Digital House - Web Full Stack</a> Mendoza, Argentina.</p>
        <p class="h6">&copy All right Reversed.<a class="text-blue ml-2" href="#" target="_blank">Luis Romano - Agustín Moya</a></p>
      </div>

    </div>
  </div>

<!-- NOTE: fin footer -->
