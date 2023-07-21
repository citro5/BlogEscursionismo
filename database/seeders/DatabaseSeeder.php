<?php

namespace Database\Seeders;

use App\Models\Difficoltà;
use App\Models\Escursione;
use App\Models\GruppoMontuoso;
use App\Models\Immagini;
use App\Models\Tipologia;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->populateDB();
    }
    private function populateDB() {
        $gruppi = ['Adamello', 'Bernina', 'Ortles-Cevedale', 'Orobie','Dolomiti'];
        $tipologie= ['escursionismo', 'alpinismo', 'via ferrata'];
        $difficoltàEscursione= ['T', 'E' ,'EE' ,'EEA'];
        $difficoltàAlpinismo= ['F','F+','PD-','PD','PD+', 'AD-','AD','AD+','D-','D','D+','TD-','TD','TD+','ED-','ED','ED+'];
        $difficoltàFerrate= ['F', 'MD' ,'D' ,'TD','ED'];
        
        foreach ($gruppi as $nome) {
            GruppoMontuoso::create([
                'nome' => $nome
            ]);
        }

        foreach ($tipologie as $nome) {
            Tipologia::create([
                'nome' => $nome
            ]);
        }
        foreach($difficoltàEscursione as $nome){
            Difficoltà::create([
                'grado_difficoltà' => $nome,
                'tipologia_id' => 1
            ]);
        } 
        foreach($difficoltàAlpinismo as $nome){
            Difficoltà::create([
                'grado_difficoltà' => $nome,
                'tipologia_id' => 2
            ]);
        } 
        foreach($difficoltàFerrate as $nome){
            Difficoltà::create([
                'grado_difficoltà' => $nome,
                'tipologia_id' => 3
            ]);
        } 
        User::create([
            'name' => 'Mattia',
            'email' => 'm.citroni001@studenti.unibs.it',
            'password' => md5('12345678q')
        ]);

        User::create([
            'name' => 'Martina',
            'email' => 'marti.rota@yahoo.com',
            'password' => md5('12345678q')
        ]);

        Escursione::create([
            'id' => '1',
            'titolo' => 'Monte Adamello',
            'data' => '2022/08/25',
            'descrizione' => 'Introduzione:
            L´Adamello per me ha sempre significato la montagna di casa essendo che sono ormai 25 anni che bazzico in alta valle camonica. L´idea di salirlo è nata fin da piccolo quando con mio papà sono salito al Rif Garibaldi per la prima volta, ma purtroppo non si è mai potuto realizzare questo sogno. Questo è stato l´anno buono, breve consulto con il mio socio e lo zaino è già pronto per una stupenda ascensione. Decidiamo di partire dal Rif. Gnutti perchè da quel versante riteniamo la salita meno pericolosa.
            Accesso:
            Salendo la val camonica in direzione Edolo, giunti a Sonico, svoltare a destra verso Garda, Rino. Oltrepassare il passaggio a livello e seguire le indicazioni per val Malga. Risalire la strada nel bosco (molto suggestiva) fino a giungere al ponte del guat dove si lascia la macchina. Prendere la strada sterrata che conduce in breve al ristoro di Premassone, da qui risalire la valle per facile sentiero fino alle famose "scale del miller". Alla vostra sinistra noterete il Rif. Baitone con la diga, tappa obbligatoria per chi percorre il sentiero numero 1 dell´Adamello. Terminate le scale, in circa 20 minuti si è al rifugio Gnutti. Tempo di percorrenza 1. 30 min.
            Descrizione della salita:
            Dal Rif. Gnutti, seguire il segna via 23 che costeggia le chiuse del laghetto Miller. Sul sentiero troverete una grata con un piccolo smottamento, ecco il sentiero vero e proprio (se l´ascensione viene iniziata con il buio è molto facile non notarla, parlo per esperienza), comunque il sentiero è ben segnalato. Risalire tutta la conca fino a giungere alla morena rocciosa.Da qui per sentiero ciotoloso e franoso continuare a salire fino all´attacco del sentiero attrezzato Terzulli che con passaggi di II grado conducono fino al passo Adamello. Il sentiero è stato sistemato nel 2007 con corde fisse nei punti più esposti, si consiglia comunque la massima attenzione. In circa tre ore dal rifugio si giunge al passo Adamello. Davanti si apre uno di quelli spettacoli unici che solo la montagna sa regalare, Il pian di neve ed intanto dietro di noi la Val Miller con a destra il corno Miller. Indossati i ramponi seguire la traccia fino alla rampa che a sua volta condurrà alla vetta. Dal ghiacciaio si costeggia la cima Ugolini dove è posto uno spartano bivacco, di seguito la cima Laghetto. E´ possibile anche evitare il ghiaccio, percorrendo per rocce le cime sopra citate, fino a ricongiungersi con la traccia che proviene dal pian di neve; da qui risalire gli ultimi trecento metri di dislivello che separano dalla vetta. Il sentiero si snoda in alcuni punti sulla cresta ovest, si consiglia la massima cautela data l´enorme esposizione. Pur sembrando di non arrivare mai la vetta è li che ci aspetta.',
            'altitudine' => '3554',
            'tempistica' => '05:00:00',
            'gruppo_id' => '1',
            'tipologia_id' => '2',
            'difficoltà' => 'PD',
            'user_id' => '1',
        ]);

        Escursione::create([
            'id' => '2',
            'titolo' => 'Cima Plem',
            'data' => '2022/07/10',
            'descrizione' => 'La bellissima Plem (m 3182) è una montagna del Gruppo dell’Adamello, raggiungibile risalendo la Val Malga da Malonno o da Sonico. Questa imponente piramide è una delle più ambite cime panoramiche delle montagne adamelline. La sua posizione strategicamente isolata, consente infatti all’escursionista che raggiunge la sua vetta, di poter osservare gran parte del gruppo. Magnifica e impressionante è la vista sulla vicina parete ovest dell’Adamello e sulle vette circostanti. La salita tutto sommato non è difficile o proibitiva, ma neppure banale, in quanto l’altitudine elevata, e la parte finale del percorso che presenta tratti impervi con placche lisce di granito inclinato, impone che sia posta adeguata attenzione. Il dislivello da affrontare, se l’escursione si fa in giornata, è notevole ed anche questo fattore richiede che l’escursionista sia ben allenato. Ovviamente, come tutte le montagne di questo livello, la salita deve essere affrontata con tempo buono e in assenza di neve e ghiaccio, altrimenti diventa alpinistica. In questa scheda viene descritta la via più semplice per raggiungere il Passo del Cristallo, che è punto di passaggio obbligato, escursionisticamente parlando, per salire la cima della Plem, e cioè dal Rif. Gnutti nella Val Miller con ritorno allo stesso, mentre risulta un poco più complessa quella che si affronta dal Rif Tonolini al Baitone; ovviamente c’è la possibilità di unire i due percorsi ed effettuare un bell’anello visto che il Passo del Cristallo è comune ai 2 itinerari.

            Itinerario
            
            La partenza quindi corrisponde a quella relativa al “giro dei tre rifugi” o a quella per il “Pantano del Miller”, escursioni già presenti nel sito, che prevedono come prima meta il passaggio dal Rif. Gnutti (m 2166), partendo dalla località “Put del Guat” raggiungibile in auto da Sonico dopo aver risalito la Val Malga tramite una stradina carrabile.
            
            Dal “Put del Guat” (m 1528), si sale in modo facile e veloce con la bella mulattiera che conduce alla malga Rifugio Premassone (m 1589) dove, superato il ponte sul torrente Remulo, si continua seguendo la segnaletica del sentiero CAI 23, mantenendo la strada principale, fino alla malga Frino. Si imbocca quindi il sentiero che quasi pianeggiante si inoltra verso l’interno della valle, costeggiando il torrente fino a raggiungere l’inizio delle cosidette “scale del Miller”, mediante le quali il sentiero si inerpica  con stretti tornanti per superare il ripidissimo gradino vallivo, guadagnando la sommità del salto roccioso. Si entra ora nella Valle del Miller e su bel sentiero, non più ripido, si prosegue tra pascoli e arrotondati roccioni fino alla malga Miller, superata la quale si giunge al Rifugio Gnutti (m 2166), in circa un’ora e mezza o poco più dalla partenza.
            
            Dal rifugio mancano ancora circa 1000 metri di dislivello per la cima, quindi dopo breve sosta si continua sul sentiero 23, che nei pressi della vicina chiesetta, intercetta il sentiero N. 1 dell’Adamello proveniente dal Baitone e diretto in Val Salarno, col quale né condivide per un tratto il percorso verso est e cioè verso l’interno della Val Miller. Superato un tratto comodo e semipianeggiante, si incontra la deviazione verso sinistra del CAI 31 diretto al Passo del Cristallo, mentre il 23 si stacca dal N.1 per proseguire verso la testata della Val Miller e quindi verso la via attrezzata “Terzulli”, utilizzata per la salita all’Adamello.
            
            Si inizia così a rimontare il ripido costone, prima su pascolo sassoso e impervio e poi su comodi e ampi lastroni di roccia chiara, tipica delle zone adamelline. Un enorme ometto ci fa da segnavia laddove il panorama e lo sguardo si ampliano verso la parete sud-ovest dell’Adamello con a fianco il massiccio Corno Miller. Si punta ora l’evidente Passo del Cristallo, posto tra l’omonimo Corno a sinistra e la Cima Plem a destra, guidati comunque sempre dai segnavia e da ometti di sassi. Raggiunta la base del valico alla considerevole quota di 2885 metri, dove giunge dal Rif. Tonolini e dal versante opposto anche l’ impegnativo percorso già citato, si prosegue verso nord-est tra pietraie fino alla base di un ripido canale roccioso, che bisogna risalire in facile arrampicata. Superato questo punto rimangono ancora delle lastre piuttosto inclinate di roccia liscia, da affrontare con la dovuta cautela, fino all’ammasso di grosse pietre che ci dividono dalla vetta, quindi, spostandosi un poco a destra per oltrepassarle si arriva in cima. Sulla vetta della Plem (m 3182), è posta una piccola campana con croce e 2 targhe commemorative.
            
            Il paesaggio è veramente fantastico in tutte le direzioni, sia sulla Val d’Avio e verso il Rif. Garibaldi, sia sulla conca del Baitone coi suoi laghetti e il Rif. Tonolini e ovviamente sulla Val Miller e verso l’Adamello, che pare quasi si possa toccare.
            
            Il ritorno in discesa, sullo stesso percorso fatto in salita, va affrontato con estrema attenzione fino al Passo del Cristallo, dove poi diventa più comodo e tranquillo e necessita di almeno tre ore.',
            'altitudine' => '3182',
            'tempistica' => '03:45:00',
            'gruppo_id' => '1',
            'tipologia_id' => '1',
            'difficoltà' => 'EEA',
            'user_id' => '1',
        ]);
        Escursione::create([
            'id' => '3',
            'titolo' => 'Monte Aviolo',
            'data' => '2021/07/21',
            'descrizione' => 'Il Monte Aviolo (m 2881), chiamato anche “Sima del Castel”  è una bella e isolata vetta, dalla evidente forma triangolare, che domina Edolo, la Val Galinera, la Val Finale e la Val Paghera di Vezza d’Oglio. Il primo salitore fu Prudenzini nell’estate del 1888 assieme ad altri due alpinisti. Eccezionale il panorama che si spinge dalla Valcamonica e dalle cime del Baitone, alla Valtellina, Ortles/Cevedale e Bernina sino al lontano Monte Rosa. La montagna riveste interessi di tipo floristico e vegetale per la presenza di una grossa colonia del raro pino cembro e di estesi mugheti.

            Il ritorno. arricchisce la già soddisfacente escursione, passando dal Rifugio Malga Stain (m 1833) tramite il Passo della Foppa (m 2332), già visti nella gita relativa.
            
            Itinerario
            
            In auto da Edolo, tramite la strada del M. Colmo si raggiunge l’area di pic-nic situata alla quota di circa 1550 metri, vicino alla località Pozzuolo. In una decina di minuti, su comoda stradetta con segnavia CAI1-72, si arriva ai prati di Pozzuolo. Si seguono le indicazioni del CAI 72, sino ad un’altra area attrezzata situata poco oltre, dove si abbandona il segnavia CAI 72 per risalire col CAI 34 (sentiero “Silvio Boninchi”) verso sud-est, prima nel bosco e dopo su di un ripido pascolo pietroso. Ben presto si raggiunge l’imbocco della conca morenica chiamata Foppa, situata tra il M. Colmo e il M. Piccolo a circa 2000 metri di quota. Il percorso è sempre segnato e seguendolo ci si inoltra nell’ampio vallone costituito da grossi massi e da una intensa vegetazione dominata dal pino mugo. Alla quota di 2150 metri si raggiungono delle piccole radure che precedono la base della montagna. Il sentiero si inerpica ripidamente verso la parete nord del M. Aviolo e superato il bivio per Malga Stain (CAI 34A), perviene ad uno scosceso canalino roccioso che si supera con l’aiuto di catene metalliche. Si rimonta una balza rocciosa ed un’altra morena sino ai piedi della parete terminale dove in sostanza inizia la parte seppur breve, più impegnativa, che si supera su canalini, cenge, grossi massi e roccette, con qualche pezzo facile di arrampicata. Porre attenzione e cautela sui tratti eventualmente ghiacciati. Si raggiunge la vetta alla considerevole quota di 2881 metri, dove la vista può spaziare a 360 gradi. In questo panorama merita attenzione la suggestiva ed emozionante vista delle pareti settentrionali del Baitone e della sottostante conca dell’Aviolo e del suo laghetto.
            
            Si ritorna scendendo con cautela, sul medesimo percorso di salita, sino al bivio col sentiero CAI 34A, che si segue in moderata salita verso sud, sino a raggiungere il Passo della Foppa (m 2332) dopo aver superato un facile tratto attrezzato. Questo valico divide il M. Foppa (m 2408) a est, dal M. Colmo (m 2275) a ovest. Il sentiero 34A, ora degrada facilmente sul costone sottostante sino a quando devia gradualmente verso sinistra per rimanere sulla erbosa costola meridionale del M. Foppa, che delimita alla nostra sinistra la Val Galinera. In circa un’ora o poco più si raggiunge il bel Rif. Malga Stain (m 1833).
            
            Un’altra scarsa ora, seguendo il facile sentiero CAI 1, ci riporta sulla strada del monte Colmo, poco sopra all’area di pic-nic e al parcheggio.',
            'altitudine' => '2881',
            'tempistica' => '04:00:00',
            'gruppo_id' => '1',
            'tipologia_id' => '1',
            'difficoltà' => 'EE',
            'user_id' => '1',
        ]);

        Escursione::create([
            'id' => '4',
            'titolo' => 'Pizzo Badile Camuno',
            'data' => '2020/06/15',
            'descrizione' => 'GENERALE
            La Ferrata al Pizzo Badile Camuno si sviluppa su una delle vette meridionali del Gruppo dellAdamello nell’alta Val Camonica in provincia di Brescia. Nonostante la bassa quota, a causa del dislivello di 1220m e la presenza di tratti impegnativi lungo l’avvicinamento e il rientro, risulta un’escursione abbastanza impegnativa. Infatti, nel bosco, sono presenti passaggi di I grado sia in arrampicata che in disarrampicata. Dal punto di vista tecnico, invece, non presenta grosse difficoltà ma rimane comunque sconsigliata agli escursionisti inesperti.
            
            LOCALITÀ DI PARTENZA
            Il punto di partenza dell’itinerario è nei pressi del paese di Cimbergo nell’alta Val Camonica in provincia di Brescia. Una volta lasciata la statale 42 all’altezza di Ceto, proseguire sulla destra sulla SP 88 fino al paese. Giunti a Cimbergo imbocchiamo via Don Battista Palanioli seguendo le indicazioni per Volano e Redole. Proseguiamo su questa strada ignorando i bivi che incontriamo finché questa non diventa sterrata (1050 m). Una volta arrivati parcheggiamo e iniziamo il percorso di avvicinamento.
            
            AVVICINAMENTO
            Procediamo sulla sterrata per 20’ circa fino a raggiungere il Rifugio De Marie (1420 m). Dal rifugio lasciamo il sentiero 16 e prendiamo invece il sentiero 77 seguendo a destra i cartelli che ci indicano la direzione. Il sentiero entra nel bosco e via via aumenta di pendenza facendosi molto ripido, proseguiamo e dopo 30’ troviamo già i primi tratti attrezzati: una lastronata di rocce attrezzata con una lasca catena. La superiamo e proseguiamo sul sentiero, che man mano si fa sempre più ripido e scivoloso. Seguiamo i segni bianco-rossi e, risalendo alcuni massi con l’ausilio di staffe, infine usciamo dal bosco.
            
            Dopo alcuni salti rocciosi giungiamo al secondo tratto attrezzato con catena. Un’altra lastronata appoggiata lunga circa 30-40 metri che vista la mancanza di appigli non sarà così semplice da superare.  Proseguiamo il sentiero di salita e arriviamo nei pressi di un piccolo bivacco. Da questo punto continuiamo su un sentiero, che tra passaggi esposti ma abbastanza facili, ci conduce all’attacco della Ferrata al Pizzo Badile Camuno. (2h 30’ dal parcheggio)
            
            DESCRIZIONE FERRATA
            La Ferrata al Pizzo Badile Camuno inizia risalendo una parete abbastanza appoggiata. La progressione risulta facilitata per via della tipologia della roccia stessa ed il cavo risulta utile perlopiù come corrimano. Saliamo in direzione lineare e poi leggermente verso destra in una cengia ascendente dal quale è possibile vedere le sottostanti case di Volano. Da questo punto il cavo riprende a salire ancora più verticale cambiando spesso direzione e proseguendo poi in diagonale.
            
            Arriviamo ad un altro terrazzino e continuiamo sempre in pendenza, che ora si fa anche più accennata. Risaliamo una placca gradinata e successivamente superiamo un salto verticale ma non difficile. Infine, pieghiamo verso destra rimontando alcune roccette verso la base dell’ultimo tratto di cavo che segna il termine della ferrata al Pizzo Badile Camuno. Ora, da qui seguiamo verso sinistra la ampia cresta fino ad arrivare alla Madonnina immediatamente prima della vetta. (2435 m - 30’ dall’attacco - 3h 30’ totali)
            
            DISCESA
            Il rientro avviene seguendo a ritroso l’itinerario dell’andata. Ovviamente bisogna prestare attenzione ad alcuni passaggi che in discesa posso risultare anche più complicati della salita. (2h 45’ dalla vetta - 6h 30’ totali).',
            'altitudine' => '2435',
            'tempistica' => '03:15:00',
            'gruppo_id' => '1',
            'tipologia_id' => '3',
            'difficoltà' => 'MD',
            'user_id' => '2',
        ]);
        for($i=1;$i<10;$i++){
            Immagini::create([
                'path'=>"/img/upload/1{$i}.jpg",
                'escursione_id'=> '1',
            ]);
            Immagini::create([
                'path'=>"/img/upload/2{$i}.jpg",
                'escursione_id'=> '2',
            ]);
            Immagini::create([
                'path'=>"/img/upload/3{$i}.jpg",
                'escursione_id'=> '3',
            ]);
            Immagini::create([
                'path'=>"/img/upload/4{$i}.jpg",
                'escursione_id'=> '4',
            ]);
        }
    }
}
