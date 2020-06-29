<div class="main main-raised">
    <div class="container">
        <div class="section section-contacts" id="contactanos">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="text-center title">¿ Trabajamos juntos ?</h2>
                    <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                    <form class="contact-form" action="contact" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nombre completo</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Correo</label>
                                    <input type="email" id="correo" name="correo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mensaje" class="bmd-label-floating">Mensaje</label>
                            <textarea type="text" class="form-control" rows="4" id="mensaje"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 ml-auto mr-auto text-center">
                                <div class="g-recaptcha text-center" data-sitekey="6LeBTe4UAAAAAO2ZxlGTgKrAtODXYI5CObHmw3EZ"></div>
                                <button class="btn bg-orange btn-raised"  id="btnSend">
                                Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>