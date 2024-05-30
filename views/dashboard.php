<section class="blog_categorie_area">
            <div class="container mt-5 mb-3">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="assets/image/blog/cat-post/cat-post-3.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="blog-details.html"><h5><?= $nbreDeClients ?></h5></a>
                                    <div class="border_line"></div>
                                    <p>Clients</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="assets/image/blog/cat-post/cat-post-2.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="blog-details.html"><h5><?= $recetteMensuelles ?>FCFA</h5></a>
                                    <div class="border_line"></div>
                                    <p>Recettes Mensuelles</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="assets/image/blog/cat-post/cat-post-1.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="blog-details.html"><h5><?= $nombreChambre ?></h5></a>
                                    <div class="border_line"></div>
                                    <p>Chambres</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <div class="container">
                <h1 class="text-center">
                    Comptabilite Generale
                </h1>
                <canvas id="graphiqueReservations">

                </canvas>
     </div>
</section>
<script>
    // Récupérer les données PHP dans JavaScript
    var $montantReservationsParMois = <?= json_encode($montantReservationsParMois) ?>;

    // Convertir les clés et les valeurs en tableaux séparés
    var mois = Object.keys($montantReservationsParMois);
    var montants = Object.values($montantReservationsParMois);

    // Créer le graphique avec Chart.js
    var ctx = document.getElementById("graphiqueReservations").getContext("2d");

    var mychart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: mois,
            datasets: [{
                label: 'Montant des réservations par mois',
                data: montants,
                backgroundColor: 'blue',
                borderColor: 'cyan',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
