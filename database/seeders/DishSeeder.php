<?php

namespace Database\Seeders;

// Models
use App\Models\Dish;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes = [
            [
                'name' => 'Lasagna Lussuria',
                'img' => 'Italiano.jpg',
                'description' => 'Strati di pasta fresca, ragù di carne, besciamella e formaggio, cotti al forno fino a doratura.',
                'price' => 19.75,
                'visible' => true,
                'type' => 'Italiano'
            ],
            [
                'name' => 'Tagliatelle Trastevere',
                'img' => 'Italiano.jpg',
                'description' => 'Tagliatelle fatte in casa condite con una salsa cremosa al pesto di basilico, pomodori secchi e pinoli tostati.',
                'price' => 17.80,
                'visible' => true,
                'type' => 'Italiano'
            ],
            [
                'name' => 'Gnocchi Gourmet',
                'img' => 'Italiano.jpg',
                'description' => 'Gnocchi di patate fatti in casa, serviti con una delicata salsa al gorgonzola e noci tostate.',
                'price' => 20.40,
                'visible' => true,
                'type' => 'Italiano' 
            ],
            [
                'name' => 'Pappardelle Primavera',
                'img' => 'Italiano.jpg',
                'description' => "Larghe fettuccine condite con una miscela di verdure di stagione saltate in padella con olio d'oliva e aglio.",
                'price' => 15.20,
                'visible' => true,
                'type' => 'Italiano'
            ],
            [
                'name' => 'Cannelloni Capriccio',
                'img' => 'Italiano.jpg',
                'description' => 'Cannelloni ripieni di carne macinata, ricotta e spinaci, cotti al forno con salsa besciamella e formaggio grana.',
                'price' => 18.25,
                'visible' => true,
                'type' => 'Italiano'
            ],
            [
                'name' => 'Texas BBQ Brisket Bonanza',
                'img' => 'Americano.jpg',
                'description' => 'Fetta di petto di manzo affumicato lentamente per ore, ricoperto con una salsa barbecue texana piccante e servito con fagioli al forno e pane di mais.',
                'price' => 22.50,
                'visible' => true,
                'type' => 'Americano'
            ],
            [
                'name' => 'Southern Fried Chicken Supreme',
                'img' => 'Americano.jpg',
                'description' => 'Cosce di pollo marinato in spezie, impanate e fritte fino a diventare croccanti, servite con salsa di miele piccante e purea di patate.',
                'price' => 18.95,
                'visible' => true,
                'type' => 'Americano'
            ],
            [
                'name' => 'New York Cheesecake Delight',
                'img' => 'Americano.jpg',
                'description' => 'Cheesecake cremosa con una base di biscotti, ricoperta da una generosa dose di salsa di fragole fresche e panna montata.',
                'price' => 10.80,
                'visible' => true,
                'type' => 'Americano'
            ],
            [
                'name' => 'California Cobb Salad Celebration',
                'img' => 'Americano.jpg',
                'description' => 'Insalata mista croccante con pollo alla griglia, bacon croccante, uova sode, avocado a fette, pomodori ciliegini e formaggio blu, condita con una vinaigrette balsamica.',
                'price' => 15.75,
                'visible' => true,
                'type' => 'Americano'
            ],
            [
                'name' => 'Philly Cheese Steak Spectacular',
                'img' => 'Americano.jpg',
                'description' => 'Fettine di manzo grigliate, peperoni e cipolle saltati, ricoperti di formaggio provolone fuso, serviti su un panino hoagie tostato.',
                'price' => 16.40,
                'visible' => true,
                'type' => 'Americano'
            ],
            [
                'name' => 'Taco Tornado Tropicale',
                'img' => 'Messicano.jpg',
                'description' => 'Tortilla di mais ripiena di carne di manzo marinata con spezie messicane, avocado a fette, pomodori freschi, formaggio cheddar e salsa piccante, servita con riso e fagioli neri.',
                'price' => 12.95,
                'visible' => true,
                'type' => 'Messicano'
            ],
            [
                'name' => 'Enchiladas Esotiche',
                'img' => 'Messicano.jpg',
                'description' => 'Tortillas di mais ripiene di pollo alla griglia, cipolle e peperoni, ricoperte con una salsa rossa piccante e formaggio fuso, accompagnate da guacamole e pico de gallo.',
                'price' => 14.50,
                'visible' => true,
                'type' => 'Messicano'
            ],
            [
                'name' => 'Quesadilla Quattro Formaggi',
                'img' => 'Messicano.jpg',
                'description' => 'Tortilla di farina ripiena di una miscela di quattro formaggi, jalapeños affettati e cipolle rosse, grigliata fino a ottenere una croccantezza dorata, servita con salsa di pomodoro.',
                'price' => 10.80,
                'visible' => true,
                'type' => 'Messicano'
            ],
            [
                'name' => 'Burrito Bomba Mexicana',
                'img' => 'Messicano.jpg',
                'description' => 'Grande tortilla di farina ripiena di riso, fagioli neri, carne di maiale marinata, formaggio Monterey Jack, guacamole e pico de gallo, avvolta e grigliata fino a doratura, servita con salsa di avocado.',
                'price' => 13.75,
                'visible' => true,
                'type' => 'Messicano'
            ],
            [
                'name' => 'Nachos Nirvana',
                'img' => 'Messicano.jpg',
                'description' => 'Totopos di mais croccanti ricoperti con formaggio fuso, chili con carne, fagioli neri, peperoncini jalapeños affettati e panna acida, guarniti con salsa di pomodoro e cipolle verdi.',
                'price' => 11.20,
                'visible' => true,
                'type' => 'Messicano'
            ],
            [
                'name' => 'Sushi Sensation Sette Mari',
                'img' => 'Giapponese.jpg',
                'description' => 'Assortimento di sushi fresco, inclusi nigiri di salmone, tonno e gamberetti, roll di California e roll di tempura di gamberi, servito con salsa di soia e zenzero marinato.',
                'price' => 24.50,
                'visible' => true,
                'type' => 'Giapponese'
            ],
            [
                'name' => 'Ramen Raffinato con Tonkotsu',
                'img' => 'Giapponese.jpg',
                'description' => 'Brodo di tonkotsu ricco e cremoso arricchito con noodle ramen cotti al dente, maiale affumicato a fette, uovo marinato e cipolla verde.',
                'price' => 16.80,
                'visible' => true,
                'type' => 'Giapponese'
            ],
            [
                'name' => 'Tempura Tornado di Gamberi',
                'img' => 'Giapponese.jpg',
                'description' => 'Gamberi freschi e croccanti avvolti in una leggera pastella e fritti fino alla perfezione, serviti con una salsa a base di soia e zenzero.',
                'price' => 18.95,
                'visible' => true,
                'type' => 'Giapponese'
            ],
            [
                'name' => 'Donburi del Pescatore Piccante',
                'img' => 'Giapponese.jpg',
                'description' => 'Riso bianco cotto al vapore, servito in una ciotola con una miscela di pesce crudo marinato con salsa di soia piccante, avocado a fette, cetrioli e alghe nori.',
                'price' => 22.60,
                'visible' => true,
                'type' => 'Giapponese'
            ],
            [
                'name' => 'Sashimi Sorpresa dello Chef',
                'img' => 'Giapponese.jpg',
                'description' => 'Selezione di sashimi freschi, inclusi salmone, tonno e branzino, tagliati a mano dallo chef e serviti con wasabi fresco e salsa di soia.',
                'price' => 28.75,
                'visible' => true,
                'type' => 'Giapponese'
            ],
            [
                'name' => 'Drago Dorato Generoso',
                'img' => 'Cinese.jpg',
                'description' => 'Pollo marinato con spezie asiatiche, saltato con verdure croccanti in una salsa agrodolce, servito su un letto di riso al vapore.',
                'price' => 14.90,
                'visible' => true,
                'type' => 'Cinese'
            ],
            [
                'name' => 'Riso Fritto del Tesoro Orientale',
                'img' => 'Cinese.jpg',
                'description' => 'Riso al vapore saltato in padella con uova sbattute, piselli, carote, cipolle e gamberetti, condito con salsa di soia e olio di sesamo.',
                'price' => 16.20,
                'visible' => true,
                'type' => 'Cinese'
            ],
            [
                'name' => 'Manzo Mongolo Magnifico',
                'img' => 'Cinese.jpg',
                'description' => 'Strisce di manzo marinato in salsa teriyaki, saltate con cipolle, peperoni e funghi, servite su un letto di spaghetti di riso.',
                'price' => 18.75,
                'visible' => true,
                'type' => 'Cinese'
            ],
            [
                'name' => 'Gamberetti Grigliati al Sesamo',
                'img' => 'Cinese.jpg',
                'description' => 'Cubetti di tofu avvolti in una leggera pastella e fritti fino a doratura, serviti con una salsa piccante e una spruzzata di cipolla verde.',
                'price' => 20.40,
                'visible' => true,
                'type' => 'Cinese'
            ],
            [
                'name' => 'Tempura Tofu Tripudio',
                'img' => 'Cinese.jpg',
                'description' => 'Pollo marinato con spezie asiatiche, saltato con verdure croccanti in una salsa agrodolce, servito su un letto di riso al vapore.',
                'price' => 12.50,
                'visible' => true,
                'type' => 'Cinese'
            ],
            [
                'name' => 'Paneer Tikka Treat',
                'img' => 'Indiano.jpg',
                'description' => 'Cubetti di paneer marinate in una miscela di yogurt e spezie indiane, infilzati su spiedini e grigliati al carbone, serviti con chutney di menta e insalata.',
                'price' => 17.50,
                'visible' => true,
                'type' => 'Indiano'
            ],
            [
                'name' => 'Butter Chicken Bliss',
                'img' => 'Indiano.jpg',
                'description' => 'Pollo marinato in una salsa cremosa di pomodori, burro, panna e spezie aromatiche, servito con riso basmati profumato e naan caldo.',
                'price' => 19.80,
                'visible' => true,
                'type' => 'Indiano'
            ],
            [
                'name' => 'Dal Tadka Triumph',
                'img' => 'Indiano.jpg',
                'description' => 'Lenticchie rosse cotte lentamente con spezie indiane, finocchi, pomodori e coriandolo fresco, servite con riso al vapore e pane naan.',
                'price' => 15.90,
                'visible' => true,
                'type' => 'Indiano'
            ],
            [
                'name' => 'Aloo Gobi Delight',
                'img' => 'Indiano.jpg',
                'description' => 'Cubetti di patate e cavolfiore saltati con cipolle, pomodori, zenzero e spezie, finiti con una spruzzata di succo di limone e coriandolo fresco.',
                'price' => 16.50,
                'visible' => true,
                'type' => 'Indiano'
            ],
            [
                'name' => 'Vegetarian Biryani Bonanza',
                'img' => 'Indiano.jpg',
                'description' => 'Una miscela fragrante di riso basmati, verdure miste, mandorle tostate, uvetta e spezie, cotta lentamente a fuoco lento e servita con raita fresco.',
                'price' => 18.25,
                'visible' => true,
                'type' => 'Indiano'
            ],
            [
                'name' => 'Zen Zucchini Zenzero Zucchine',
                'img' => 'Vegetariano.jpg',
                'description' => 'Zucchine saltate con zenzero fresco, aglio e peperoncino rosso, servite su un letto di couscous al limone e prezzemolo.',
                'price' => 14.90,
                'visible' => true,
                'type' => 'vegetariano'
            ],
            [
                'name' => 'Fagioli Funghi Fantasiae',
                'img' => 'Vegetariano.jpg',
                'description' => 'Fagioli borlotti e funghi misti saltati con cipolla, aglio e timo fresco, serviti su una fetta di pane integrale tostato.',
                'price' => 16.50,
                'visible' => true,
                'type' => 'vegetariano'
            ],
            [
                'name' => 'Quinoa Quotidiana con Verdure',
                'img' => 'Vegetariano.jpg',
                'description' => "Quinoa tricolore cotta al vapore, mescolata con pomodorini, cetrioli, peperoni, olive nere e prezzemolo fresco, condita con olio d'oliva e aceto balsamico.",
                'price' => 17.80,
                'visible' => true,
                'type' => 'vegetariano'
            ],
            [
                'name' => 'Melanzane al Miele Mediterraneo',
                'img' => 'Vegetariano.jpg',
                'description' => 'Fette di melanzane grigliate, marinate con miele di agrumi, timo fresco e pepe nero, servite con salsa di yogurt greco e mandorle tostate.',
                'price' => 16.50,
                'visible' => true,
                'type' => 'vegetariano'
            ],
            [
                'name' => 'Insalata Intensa di Lenticchie',
                'img' => 'Vegetariano.jpg',
                'description' => 'Lenticchie cotte al dente, mescolate con pomodorini, cetrioli, feta sbriciolata, olive kalamata e menta fresca, condite con una vinaigrette al limone.',
                'price' => 15.60,
                'visible' => true,
                'type' => 'vegetariano'
            ],
            [
                'name' => 'Salmone alla Griglia con Salsa Tropicale',
                'img' => 'Pesce.jpg',
                'description' => 'Filetto di salmone fresco alla griglia, condito con una salsa esotica a base di mango, lime e peperoncino, servito con riso basmati e verdure alla griglia.',
                'price' => 22.90,
                'visible' => true,
                'type' => 'pesce'
            ],
            [
                'name' => 'Tonno Teriyaki Tentazione',
                'img' => 'Pesce.jpg',
                'description' => 'Filetto di tonno fresco marinato in salsa teriyaki, grigliato alla perfezione, servito su un letto di spinaci saltati con riso al vapore.',
                'price' => 24.50,
                'visible' => true,
                'type' => 'pesce'
            ],
            [
                'name' => 'Ceviche Calamari Creolo',
                'img' => 'Pesce.jpg',
                'description' => 'Calamari freschi marinati in succo di lime, coriandolo fresco, peperoncino rosso e cipolla rossa, serviti con chips di mais croccanti.',
                'price' => 18.75,
                'visible' => true,
                'type' => 'pesce'
            ],
            [
                'name' => 'Gamberi al Curry Cremoso',
                'img' => 'Pesce.jpg',
                'description' => 'Gamberoni grandi saltati con cipolle, aglio, peperoni e curry in una salsa di latte di cocco, serviti con riso basmati e naan caldo.',
                'price' => 21.20,
                'visible' => true,
                'type' => 'pesce'
            ],
            [
                'name' => 'Spigola alla Mediterranea',
                'img' => 'Pesce.jpg',
                'description' => 'Filetto di spigola fresco cotto al forno con olive kalamata, pomodorini, capperi, aglio e prezzemolo, servito con patate al forno.',
                'price' => 26.80,
                'visible' => true,
                'type' => 'pesce'
            ],
            [
                'name' => 'Pad Thai Paradise',
                'img' => 'Thailandese.jpg',
                'description' => 'Vermicelli di riso saltati con gamberetti freschi, tofu croccante, uova sbattute, germogli di soia, arachidi tritate e salsa di tamarindo, serviti con lime e coriandolo fresco.',
                'price' => 16.50,
                'visible' => true,
                'type' => 'Thailandese'
            ],
            [
                'name' => 'Tom Yum Travolgente',
                'img' => 'Thailandese.jpg',
                'description' => 'Zuppa piccante a base di gamberi freschi, funghi straw e pomodori ciliegia, arricchita con citronella, lime, foglie di lime kaffir e peperoncino rosso, servita con riso al vapore.',
                'price' => 18.90,
                'visible' => true,
                'type' => 'Thailandese'
            ],
            [
                'name' => 'Massaman Magnifico',
                'img' => 'Thailandese.jpg',
                'description' => 'Stufato aromatico di manzo cotto a fuoco lento con latte di cocco, patate, cipolle e arachidi, arricchito con spezie thailandesi e servito con riso basmati.',
                'price' => 20.80,
                'visible' => true,
                'type' => 'Thailandese'
            ],
            [
                'name' => 'Green Curry Glorioso',
                'img' => 'Thailandese.jpg',
                'description' => 'Curry verde cremoso a base di pollo, melanzane, peperoni, bambù e basilico thai, servito con riso jasmin.',
                'price' => 19.50,
                'visible' => true,
                'type' => 'Thailandese'
            ],
            [
                'name' => 'Mango Sticky Rice Sorpresa',
                'img' => 'Thailandese.jpg',
                'description' => 'Riso glutinoso al vapore servito con fette di mango maturo, cotto in una salsa di latte di cocco dolce e aromatizzato con semi di sesamo tostati.',
                'price' => 14.75,
                'visible' => true,
                'type' => 'Thailandese'
            ],
            [
                'name' => 'Bibimbap Brillante',
                'img' => 'Coreano.jpg',
                'description' => 'Un piatto coreano tradizionale composto da riso al vapore, verdure saltate, carne di manzo marinata, uovo fritto e salsa gochujang, servito con kimchi.',
                'price' => 18.90,
                'visible' => true,
                'type' => 'Coreano'
            ],
            [
                'name' => 'Bulgogi Bello',
                'img' => 'Coreano.jpg',
                'description' => 'Sottili fette di manzo marinato con salsa di soia, aglio, sesamo e zucchero, grigliate alla perfezione e servite con riso al vapore e insalata di cetrioli.',
                'price' => 22.50,
                'visible' => true,
                'type' => 'Coreano'
            ],
            [
                'name' => 'Kimchi Jigae Jubilant',
                'img' => 'Coreano.jpg',
                'description' => 'Zuppa coreana piccante a base di kimchi fermentato, tofu, carne di maiale, cipolle e peperoncino, servita bollente con riso.',
                'price' => 16.80,
                'visible' => true,
                'type' => 'Coreano'
            ],
            [
                'name' => 'Tteokbokki Tempo',
                'img' => 'Coreano.jpg',
                'description' => 'Bastoncini di riso al vapore cotti in una salsa piccante di gochujang, serviti con uova sode, pesce e verdure miste.',
                'price' => 14.50,
                'visible' => true,
                'type' => 'Coreano'
            ],
            [
                'name' => 'Japchae Giubiloso',
                'img' => 'Coreano.jpg',
                'description' => 'Vermicelli di patate dolci saltati con carne di manzo marinata, verdure miste e funghi, conditi con salsa di soia e olio di sesamo, serviti con kimchi.',
                'price' => 19.75,
                'visible' => true,
                'type' => 'Coreano'
            ],
            [
                'name' => 'Paella Party',
                'img' => 'Spagnolo.jpg',
                'description' => 'La classica paella spagnola con gamberi, pollo, cozze, vongole e piselli, cotta lentamente in un brodo di zafferano e servita con fette di limone.',
                'price' => 25.90,
                'visible' => true,
                'type' => 'Spagnolo'
            ],
            [
                'name' => 'Tapas Tapenade',
                'img' => 'Spagnolo.jpg',
                'description' => 'Una selezione di tapas spagnole, inclusi patatas bravas, albóndigas, croquetas, e pinchos con olive e formaggio, serviti con una salsa di pomodoro piccante.',
                'price' => 25.90,
                'visible' => true,
                'type' => 'Spagnolo'
            ],
            [
                'name' => 'Gazpacho Gustoso',
                'img' => 'Spagnolo.jpg',
                'description' => "Zuppa fredda di pomodoro, peperoni, cetrioli, cipolle e aglio, condita con olio d'oliva e aceto di sherry, servita con crostini all'aglio.",
                'price' => 18.50,
                'visible' => true,
                'type' => 'Spagnolo'
            ],
            [
                'name' => 'Tortilla de Patatas Triunfante',
                'img' => 'Spagnolo.jpg',
                'description' => 'Tortilla spagnola tradizionale con patate, cipolle e uova, cotta lentamente fino a doratura, servita con una generosa porzione di alioli.',
                'price' => 15.75,
                'visible' => true,
                'type' => 'Spagnolo'
            ],
            [
                'name' => 'Churros Fiesta',
                'img' => 'Spagnolo.jpg',
                'description' => 'Churros fritti croccanti serviti con cioccolato caldo denso e salsa di caramello, accompagnati da una pallina di gelato alla vaniglia.',
                'price' => 10.50,
                'visible' => true,
                'type' => 'Spagnolo'
            ],
            [
                'name' => 'Moussaka Magnifica',
                'img' => 'Greco.jpg',
                'description' => 'Un piatto greco classico con strati di melanzane grigliate, carne macinata di agnello, pomodori, patate e besciamella, gratinato al forno.',
                'price' => 18.90,
                'visible' => true,
                'type' => 'Greco'
            ],
            [
                'name' => 'Souvlaki Squisito',
                'img' => 'Greco.jpg',
                'description' => 'Spiedini di carne di maiale marinata con olive, peperoni e cipolle, grigliati alla perfezione e serviti con pita calda, tzatziki e insalata greca.',
                'price' => 16.50,
                'visible' => true,
                'type' => 'Greco'
            ],
            [
                'name' => 'Moussaka Magnifica',
                'img' => 'Greco.jpg',
                'description' => 'Un piatto greco classico con strati di melanzane grigliate, carne macinata di agnello, pomodori, patate e besciamella, gratinato al forno.',
                'price' => 18.90,
                'visible' => true,
                'type' => 'Greco'
            ],
            [
                'name' => 'Dolmades Delizia',
                'img' => 'Greco.jpg',
                'description' => "Foglie di vite ripiene di riso, pomodori secchi, pinoli e uvetta, cotte lentamente in brodo di limone e servite con una salsa di yogurt all'aglio.",
                'price' => 14.80,
                'visible' => true,
                'type' => 'Greco'
            ],
            [
                'name' => 'Horiatiki Heaven',
                'img' => 'Greco.jpg',
                'description' => "Insalata greca classica con pomodori maturi, cetrioli, olive kalamata, feta, cipolle rosse e peperoncini, condita con olio d'oliva e origano.",
                'price' => 12.50,
                'visible' => true,
                'type' => 'Greco'
            ],
            [
                'name' => 'Baklava Bliss',
                'img' => 'Greco.jpg',
                'description' => 'Strati di pasta fillo croccante ripieni di noci tritate e cannella, bagnati con sciroppo di miele profumato e serviti con una pallina di gelato alla vaniglia.',
                'price' => 9.95,
                'visible' => true,
                'type' => 'Greco'
            ],
        ];

        $restaurantId = null;


        foreach ($dishes as $singleDish) {

            /* imposto la relazione con il ristorante, in base al tipo del piatto,
                impostando la variab */
            if($singleDish['type'] == 'Italiano'){
                $restaurantId = 1;
            }
            elseif($singleDish['type'] == 'Americano'){
                $restaurantId = 2;
            }
            elseif($singleDish['type'] == 'Messicano'){
                $restaurantId = 3;
            }
            elseif($singleDish['type'] == 'Giapponese'){
                $restaurantId = 4;
            }
            elseif($singleDish['type'] == 'Cinese'){
                $restaurantId = 5;
            }
            elseif($singleDish['type'] == 'Indiano'){
                $restaurantId = 6;
            }
            elseif($singleDish['type'] == 'Vegetariano'){
                $restaurantId = 7;
            }
            elseif($singleDish['type'] == 'Pesce'){
                $restaurantId = 8;
            }
            elseif($singleDish['type'] == 'Thailandese'){
                $restaurantId = 9;
            }
            elseif($singleDish['type'] == 'Coreano'){
                $restaurantId = 10;
            }
            elseif($singleDish['type'] == 'Spagnolo'){
                $restaurantId = 11;
            }
            elseif($singleDish['type'] == 'Greco'){
                $restaurantId = 12;
            }
            else{
                $restaurantId = null;
            }

            $dish = Dish::create([
                'name' => $dish->name,
                'img' => $dish->img,
                'description' => $dish->description,
                'price' => $dish->price,
                'visible' => $dish->price,
                'restaurant_id' => $restaurantId
            ]);
        };
    }
}
