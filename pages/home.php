<?php
   use App\CoreClasses\sessions\SessionMng;
    SessionMng::init_php_session();
?>
<div class="Page_inner">
        <section id="section_home">
            <div class="header_intro">
                <h1>SUDRE FLORIAN </h1>

                <h2>recherche alternance fullstack <?=  SessionMng::GETSessionData('test') ?></h2>
                <p>Bienvenue sur mon site Web Actuellement en construction.</p>
                <p>Celui-ci étant mon premier site web, j’ai décidé de le faire sans Framework avec un model MVC </p>
                <p>Ma décision de ne pas utiliser de Framework, ni composer est l’apprentissage des bases dans le développement web, les connaitre me permettra pour l’avenir une compréhension plus poussé dans les Framework et les Stack que j’utiliserais.</p>
                <p>La construction prend un peut de temps car je suis actuellement dans un travail alimentaire le temps de trouvé une entreprise d’accueil pour réaliser mon alternance et développer mes compétences dans le développement web.</p>            
                <h3>Etape effectué : </h3>
                <ul>
                    <li>Base de connaissance en html, css, javascript, php, mysql ;</li>
                    <li>Creation de la page d’acceuil .</li>
                    <li>Creation de la page a_propos. </li>
                    <li>Creation de la page competence.</li>
                    <li>Apprentissage du model MVC pour mon site.</li>
                    <li>mise en place du model MVC .</li>
                    <li>Mise en place d’un auto loader simple .</li>
                    <li>Edition du .htacces.</li>
                    <li>Test de connection avec la bdd</li>
                    <li>Creation de la page de login.(pour mon administration)</li>
                
                </ul>
                <h3>Les prochaine étapes: </h3>
                <ul>
                    <li>Creation d’un template pour mes pages projets</li>
                    <li>Mise en place de la page dynamique de projet.</li>
                    <li>Creation de la page d’administration et d’édition de projet </li>
                    <li>Connection avec ma BDD pour le stockage des information ,photo et video des projets.</li>
                   
                </ul>
            
            
            </div>
        
        </section>
    </div>



