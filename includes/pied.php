<footer class="footer-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Qui sommes-nous?</h6>
                            <p>
                            Dans notre hôtel, nous nous engageons à offrir une expérience inégalée de luxe et de confort. Notre équipe dévouée s’efforce de dépasser les attentes, offrant un service exceptionnel, des équipements luxueux et un emplacement de choix. Notre objectif est de créer des souvenirs inoubliables pour chaque client.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Liens Utiles</h6>
                            <div class="row">
                                <div class="col-4">
                                    <ul class="list_style">
                                        <li><a href="?page=home">Accueil</a></li>
                                        <li><a href="?page=chambre">Chambres</a></li>
                                        <li><a href="?page=reservation">Reservations</a></li>
                                    </ul>
                                </div>									
                            </div>							
                        </div>
                    </div>							
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Newsletter</h6>
                            <p>For business professionals caught between high OEM price and mediocre print and graphic output, </p>		
                            <div id="mc_embed_signup">
                                <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                                    <div class="input-group d-flex flex-row">
                                        <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                        <button class="btn sub-btn"><span class="lnr lnr-location"></span></button>		
                                    </div>									
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget instafeed">
                            <h6 class="footer_title">InstaFeed</h6>
                            <ul class="list_style instafeed d-flex flex-wrap">
                                <li><img src="assets/image/instagram/Image-01.jpg" alt=""></li>
                                <li><img src="assets/image/instagram/Image-02.jpg" alt=""></li>
                                <li><img src="assets/image/instagram/Image-03.jpg" alt=""></li>
                                <li><img src="assets/image/instagram/Image-04.jpg" alt=""></li>
                                <li><img src="assets/image/instagram/Image-05.jpg" alt=""></li>
                                <li><img src="assets/image/instagram/Image-06.jpg" alt=""></li>
                                <li><img src="assets/image/instagram/Image-07.jpg" alt=""></li>
                                <li><img src="assets/image/instagram/Image-08.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div>						
                </div>
                <div class="border_line"></div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous les droits reserves | Concu avec <i class="fa fa-heart-o" aria-hidden="true"></i> par <a href="https://github.com/PilgrimMindset97" target="_blank">Congo Elikia Technologie</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    <div class="col-lg-4 col-sm-12 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.ajaxchimp.min.js"></script>
        <script src="assets/js/mail-script.js"></script>
        <script src="assets/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="assets/vendors/nice-select/assets/js/jquery.nice-select.js"></script>
        <script src="assets/js/mail-script.js"></script>
        <script src="assets/js/stellar.js"></script>
        <script src="assets/vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
        <script>
            $(document).ready( function () {
                                            $('#myTable').DataTable();
                                           } );


            function exporter(id) {
                var printContents = document.getElementById(id).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();
                document.body.innerHTML = originalContents;

                location.reload();
                
            }
        </script>
<?php if (isset($_GET["page"]) && $_GET["page"]=="reservation"): ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(function () {
            //avoir la date d'aujourd'hui
            var today = new Date();
            var highlightedDates = [];
            // ajout des 60 procains jours
            for (let i = 0; i <=60; i++) {
                var date = new Date(today);
                date.SetDate(date.getDate() +i);
                highlightedDates.push(date.toISOString().split('T')[0]);
                
            }
            //initialisation de date picker
            $(".checkin-date").datepicker({
                dateFormat : 'dd/MM/yy',
                minDate : 0,
                beforeShowDay: function (date) {
                    var dateString = $.datepicker.format('yy-MM-dd', date);
                    if (highlightedDates.indexof(dateString)!==-1) {
                        return[true, 'highlight','Available'];
                        
                    }
                    return [true, '',''];
                }
            });
        });
    </script>
 <?php endif; ?>   
    </body>
</html>