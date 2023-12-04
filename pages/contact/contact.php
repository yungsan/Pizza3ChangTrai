<section>
    <div class="container-fluid page-header mb-5" style="background: none">
        <div class="content">
            <div class="container">
                <div class="row align-items-stretch justify-content-center no-gutters">
                    <div class="col-md-7">
                        <div class="form h-100 contact-wrap p-5">
                            <h3 class="text-center text-primary">Liên hệ</h3>
                            <form class="mb-5" method="post" id="contactForm" name="contactForm">
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                <label for="" class="col-form-label">Name *</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Vui lòng nhập tên của bạn">
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                <label for="" class="col-form-label">Email *</label>
                                <input type="email" class="form-control" name="email" id="email"  placeholder="Vui lòng nhập email">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 form-group mb-3">
                                <label for="budget" class="col-form-label">Vấn đề</label>
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Vấn đề của bạn">
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-12 form-group mb-3">
                                <label for="message" class="col-form-label">Lời nhắn *</label>
                                <textarea class="form-control" name="message" id="message" cols="30" rows="4"  placeholder="Để lại lời nhắn của bạn"></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-5 form-group text-center">
                                <input type="submit" value="Gửi" class="submit btn btn-block btn-primary rounded py-2 px-4 p-4">
                                <!-- <span class="submitting"></span> -->
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="pages/contact/contact.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
</section>