<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Word;
use Illuminate\Support\Str;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $words = [
            //? HTML

            ['title' => 'Head', 'definition' => 'Un documento HTML è composto da due parti principali, una parte superiore chiamata head ( testa ) e una parte inferiore chiamata "body" ( corpo ). La sezione head è l\'area dedicata all\'intestazione ( header ) del documento HTML e comprende tutte quelle informazioni di controllo che non sono visualizzate dal browser ma che consentono la corretta visualizzazione della pagina. In questa sezione vengono inseriti tutti i meta tag in HTML per definire il titolo, gli stili, gli script e le altre informazioni.'],
            ['title' => 'Body', 'definition' => 'E\' la sezione centrale, o corpo appunto, delle pagine web. Questa sezione racchiude tutti i contenuti, come il testo, le immagini e i collegamenti che costituiscono la parte visualizzata dal browser.'],
            ['title' => 'Tag', 'definition' => 'Si tratta di una una keyword del linguaggio di markup racchiusa tra parentesi angolari ( <> ).'],
            ['title' => 'Meta Tag', 'definition' => 'I metadati vengono generalmente utilizzati per specificare il set di caratteri, la descrizione della pagina, le parole chiave, l\'autore del documento e le impostazioni della visualizzazione.'],
            ['title' => 'Opening/closing Tag', 'definition' => 'Sono tag che necessitano di un\'apertura e una chiusura <tag>content</tag>'],
            ['title' => 'Self-closing Tag', 'definition' => 'Esistono degli elementi che non necessitano di alcun contenuto e che da soli hanno un valore e un significato strutturale. I tag privi di contenuto prendono il nome di self-closing e sono scritti in questa forma: <tag> '],
            ['title' => 'Tag semantici', 'definition' => 'Un elemento semantico descrive espressamente il proprio significato sia al browser che allo sviluppatore. L\'uso dei tag semantici permette agli sviluppatori di marcare documenti web in modo da strutturare le informazioni secondo uno standard comune. (es <header> <main> <section> <footer>)'],
            ['title' => 'Case sensitive', 'definition' => 'L\'espressione inglese case sensitivity, traducibile in italiano come sensibilità alle maiuscole, indica ogni operazione di analisi del testo in cui le lettere maiuscole e quelle minuscole vengono trattate come fossero caratteri completamente differenti. '],
            ['title' => 'Element', 'definition' => 'L\'elemento è definito dall\'inizio di un tag, il suo contenuto e la fine dello stesso tag'],
            ['title' => 'Content', 'definition' => 'L\'attributo content fornisce il valore associato all\'attributo "http-equiv" o "name".'],
            ['title' => 'Tag nidificato', 'definition' => 'Quando un tag contiene uno o altri tag'],
            ['title' => 'Input', 'definition' => 'L\'elemento HTML <input> viene utilizzato per creare controlli interattivi per moduli basati sul Web al fine di accettare dati dall\'utente; è disponibile un\'ampia varietà di tipi di dati di input e widget di controllo'],
            ['title' => 'Form', 'definition' => 'Il tag <form> è un\'area interattiva in cui gli utenti possono inserire e inviare informazioni al server. I dati possono poi essere ricevuti da un file PHP. Nel form possiamo trovare diversi attributi tra cui: Method: Che accetta i valori Get e Post. Target: E\' possibile far aprire i dati del form in una pagina differente rispetto a quella corrente. Action: Attributo che indica l\'url del programma o della pagina di risposta che processera i dati all\'invio del form.'],
            ['title' => 'Block elements', 'definition' => 'Un elemento a livello di blocco inizia sempre su una nuova riga e occupa l\'intera larghezza disponibile'],
            ['title' => 'Inline elements', 'definition' => 'Un elemento a livello di blocco NON inizia su una nuova riga ed occupa la larghezza necessaria'],
            ['title' => 'Attributo', 'definition' => 'Un attributo è una caratteristica di un elemento, un\'informazione associata ad un elemento. Sintatticamente essa viene rappresentata nella forma nome-attributo=”valore-attributo”. Il valore assegnato all\'attributo deve essere compreso tra doppi o singoli apici.'],
            ['title' => 'Classi html', 'definition' => 'In HTML, il termine "classe" si riferisce a un attributo utilizzato per assegnare uno o più identificatori a uno o più elementi HTML. Questo attributo consente di definire stili o comportamenti specifici attraverso il foglio di stile CSS o di selezionare elementi specifici utilizzando JavaScript. Per definire una classe si usa far precedere il nome da un semplice punto. Es. .light-blu {color: lightblue}. Possono essere attribuite più classi ad un singolo elemento HTML.'],
            ['title' => 'Id', 'definition' => 'In HTML, l\'attributo "id" è utilizzato per fornire un identificatore univoco ad un elemento all\'interno del file HTML. L\'attributo "id" deve essere unico all\'interno della pagina, garantendo così che non ci siano duplicati. Es. #light-blu {color: lightblue}'],
            ['title' => 'Commenti html', 'definition' => 'Aiutano il programmatore ad annotare, ordinare, descrivere le operazioni svolte ( <!--.........-->)'],

            //? CSS

            ['title' => 'Selettore', 'definition' => 'Costrutto che permette di selezionare uno o più elementi dalla pagina web per applicare degli stili grafici'],
            ['title' => 'Proprietà', 'definition' => 'Definisce un aspetto grafico dell\'elemento o gruppo di elementi da modificare'],
            ['title' => 'Commenti css', 'definition' => 'Aiutano il programmatore ad annotare, ordinare, descrivere le operazioni svolte '],
            ['title' => 'CSS', 'definition' => 'Cascading Style Sheets, in italiano fogli di stile a cascata, è un linguaggio usato per definire la formattazione di documenti HTML, XHTML e XML. L\'introduzione del CSS si è resa necessaria per separare i contenuti delle pagine HTML dalla loro formattazione o layout e permettere una programmazione più chiara e facile da utilizzare, sia per gli autori delle pagine stesse sia per gli utenti, garantendo contemporaneamente anche il riutilizzo di codice ed una sua più facile manutenzione.'],
            ['title' => 'Selettore di tag', 'definition' => 'Seleziona tutti i tag dello stesso tipo'],
            ['title' => 'Selettore di classe', 'definition' => 'Seleziona tutti gli elementi appartenenti ad una classe(gruppo) definita dal programmatore'],
            ['title' => 'Selettore di ID', 'definition' => 'Seleziona un elemento univocamente contrassegnato'],
            ['title' => 'Selettore universale (*)', 'definition' => 'Seleziona tutti gli elementi della pagina'],
            ['title' => 'Valori', 'definition' => 'I valori di un selettore css possono essere numeri, unità di misura, percentuali, codici per la definizione dei colori, URI, parole chiave, stringhe di testo '],
            ['title' => 'Pseudo-elementi', 'definition' => 'Elemento a tutti gli effetti che però mantiene le stesse proprietà dell\'elemento al quale appartiene, almeno fintanto che queste non vengono modificate con i CSS.'],
            ['title' => 'Pseudo-classi / selettori avanzati', 'definition' => 'Selettori CSS preceduti da due punti e servono per selezionare degli elementi in base a determinate condizioni.'],
            ['title' => 'Ereditarietà css', 'definition' => 'Caratteristica che permette ad un elemento di ereditare proprietà di uno o più elementi padre in cui è contenuto '],
            ['title' => 'Block-level', 'definition' => 'Definisce come un elemento prende posto nella pagina: block-> occupa un intera riga / inline -> occupa lo stretto necessario su una riga'],
            ['title' => 'Overflow', 'definition' => 'E\' una proprietà utilizzata per gestire il comportamento del contenuto quando l\'area di contenuto è più piccola della sua dimensione effettiva.'],
            ['title' => 'Float  selettore', 'definition' => 'Con questa proprietà è possibile rimuovere un elemento dal normale flusso del documento e spostarlo su uno dei lati (destro o sinistro) del suo elemento contenitore. selettore {float: valore;}'],
            ['title' => 'Clear', 'definition' => 'La proprietà clear serve a impedire che al fianco di un elemento compaiano altri elementi con il float. Si applica solo agli elementi blocco e non è ereditata. selettore {clear: valore;}'],
            ['title' => 'Flex', 'definition' => 'Flexbox, "Flexible Box", è un layout model che offre un modo efficiente per distribuire gli spazi tra gli elementi all\'interno di un contenitore e allineare gli elementi in modo flessibile, indipendentemente dalle dimensioni dello schermo e dalla disposizione degli elementi.'],
            ['title' => '@-rules', 'definition' => 'Il termine si riferisce a regole CSS speciali che iniziano con il simbolo \'@\'. Queste regole sono utilizzate per definire stili globali, impostazioni di pagina, media query e altri aspetti specifici del foglio di stile che vanno oltre le regole di stile tradizionali.'],
            ['title' => 'Responsiveness ', 'definition' => 'Si tratta di istruzioni CSS che permettono di impostare stili differenti al variare della dimensione dello schermo. Ha come fine quello di ottimizzare la user experience.'],
            ['title' => ' Animation', 'definition' => 'Permette di definire un\'animazione da attribuire poi ad un elemento dietro specifiche: tempo di esecuzione, numero di iterazioni, ...'],
            ['title' => 'Transition', 'definition' => 'Osserva una o più proprietà di un elemento e ne definisce il comportamento al suo variare'],
            ['title' => 'Selettore :root ', 'definition' => 'Il selettore :root consente di targetizzare l\'elemento di livello più alto nel DOM o nell\'albero del documento. Questo sta ad indicare che le variabili dichiarate in questo modo sono da intendersi in ambito globale.'],
            ['title' => 'SASS', 'definition' => '(Syntactically Awesome Stylesheet) SASS è un\'estensione del linguaggio CSS che permette di utilizzare variabili, di creare funzioni e di organizzare il foglio di stile in più file. Riduce la ripetizione di CSS e quindi fa risparmiare tempo.'],
            ['title' => 'Specificità', 'definition' => 'La specificità è il valore che permette di definire la priorità di una regola CSS rispetto ad un\'altra.
            Ogni selettore ID ha specificità pari a 100.
            Ogni classe, pseudo-classe e selettore di attributo ha specificità pari a 10.
            Ogni selettore di tipo e pseudo-elemento ha specificità pari a 1.'],
            ['title' => 'Position: relative', 'definition' => 'L\'elemento viene posizionato relativamente alla posizione naturale che
            l\'elemento stesso avrebbe occupato nel normale flusso del documento. L\'elemento non viene rimosso dal flusso del documento in quanto a ingombro originario, ma solo a livello visivo.'],
            ['title' => 'Position: absolute', 'definition' => 'Il posizionamento assoluto avviene sempre rispetto al "contenitore"
            dell\'elemento. L\'elemento viene rimosso dal flusso del documento in tutto, ed è
            posizionato in base ai valori forniti con le proprietà top, right, bottom o left.'],
            ['title' => 'Position: fixed', 'definition' => 'Un elemento con posizionamento fisso non scorre con il resto del documento:
            rimane sempre fisso al suo posto. La differenza sta nel fatto che:
            per fixed il "contenitore" di riferimento è sempre il Viewport
            (cioè la parte visibile della pagina HTML).'],
            ['title' => 'z-index', 'definition' => '\'z-index\' è una proprietà che determina l\'ordine di impilamento degli elementi su uno stesso piano. Questa proprietà viene utilizzata principalmente quando si lavora con elementi sovrapposti all\'interno di un layout. Gli elementi con un valore di z-index più alto verranno visualizzati sopra quelli con un valore più basso.'],
            ['title' => 'CSS Media Query', 'definition' => 'Usando le Media Query è possibile specificare che determinate regole CSS vadano applicate solo se si verificano precise condizioni. Permettono di determinare la macro-
            tipologia di dispositivo che sta accedendo al nostro sito.'],
            ['title' => 'vw e vh', 'definition' => 'La viewport è la parte visibile dall\'utente di una pagina Web.
            1vh = 1/100 di altezza del viewport.
            1vw = 1/100 di larghezza del viewport.'],
            ['title' => 'CSS Filters', 'definition' => 'I filtri in css ci permettono di aggiungere effetti e modificare le nostre foto direttamente nella nostra pagina web, al caricamento della pagina o come effetto di un\'interazione con l\'utente.'],
            
            //? Javascript

            ['title' => 'Costrutti', 'definition' => 'un costrutto non è altro che una struttura di controllo in un linguaggio di programmazione che permettono di combinare tra loro istruzioni elementari creando cosi istruzioni complesse, controllando il flusso della loro esecuzione, i piu famosi sono i costrutti selettivi come if - else e lo switch, e i costrutti iterativi come il while e il for.'],
            ['title' => 'if', 'definition' => 'if è collegata con una condizione e seguita
            da un blocco di codice.
            Se la condizione risulta vera il blocco 
            di codice viene eseguito una sola volta;'],
            ['title' => 'else if', 'definition' => 'else if è usato a cascata di un if ed è seguito da un\'altra condizione booleana e da un altro blocco di codice. Se la condizione dell\'if a cui l\'else if è collegato risulta falsa allora viene verificata quella dell\'else if che, se vera, porterà all\'esecuzione del blocco di codice al suo interno'],
            ['title' => 'else', 'definition' => 'else si trova alla fine di un blocco if else if e offre un\'alternativa da attuare nel caso in cui tutte le condizioni dei vari if ed else if collegati siano risultate false.'],
            ['title' => 'switch', 'definition' => 'lo switch è efficace per ricevere una determinata selezione tra un numero esatto di possibilità.
            In base al valore di un\'espressione, infatti, generalmente una variabile o l\'invocazione a una funzione, viene eseguito uno tra diversi blocchi di codice contrassegnati dalla parola chiave case.'],
            ['title' => 'Break (switch)', 'definition' => 'Il comando break interrompe un blocco di istruzioni e forza l\'engine ad eseguire la prima istruzione che segue il blocco contenente il break .'],
            ['title' => 'Default (switch)', 'definition' => 'Se è previsto un blocco default, questo verrà eseguito solo nel caso in cui nessuno dei valori associati ai case precedenti combaci con il valore dell\'espressione.'],
            ['title' => 'Ciclo', 'definition' => 'A volte è necessario eseguire più volte lo stesso blocco di codice per ottenere il risultato desiderato.Questo viene effettuato usando le istruzioni di iterazione, dette anche semplicemente "cicli".'],
            ['title' => 'Ciclo For', 'definition' => 'La modalità standard di eseguire un ciclo for vede l\'utilizzo di tre espressioni racchiuse tra parentesi tonde e separate da punto e virgola indicanti rispettivamente: Inizializzazione, Condizione di iterazione, Incremento'],
            ['title' => 'Inizializzazione', 'definition' => 'Da eseguire una sola volta prima dell\'avvio del ciclo'],
            ['title' => 'Condizione di iterazione', 'definition' => 'Di natura booleana, finchè risulta vera il ciclo prosegue. Viene eseguita prima di ogni iterazione del ciclo for. Se è falsa sin dall\'inizio, il ciclo non sarà eseguito nemmeno una volta;'],
            ['title' => 'Incremento', 'definition' => 'Viene sempre eseguita alla fine di ogni iterazione e generalmente contiene l\'incremento di una variabile contatore.'],
            ['title' => 'Ciclo for in', 'definition' => 'Questo costrutto è particolarmente utile quando vogliamo ispezionare un oggetto al suo interno navigando tra le sue proprietà.'],
            ['title' => 'Ciclo for of', 'definition' => 'Se il nostro scopo fosse ancora diverso, ovvero muoverci tra gli elementi di un array potremmo usare il for…of. Ad esempio, prendiamo una lista di nomi e stampiamoli accompagnati dalla loro lunghezza.'],
            ['title' => 'Funzione', 'definition' => 'Le funzioni, sono dei pezzi di codice che possono essere richiamati più e più volte nel nostro programma principale.'],
            ['title' => 'Dichiarazione', 'definition' => 'Una dichiarazione di funzione è una istruzione che definisce una funzione e assegna un nome ad essa.
            Esempio: function MiaFunzione(parametro){//Blocco di codice};'],
            ['title' => 'Invocazione', 'definition' => 'Invocare una funzione consiste nel:
            scriverne il nome seguito dalle parentesi tonde,
            nel punto di codice in cui vogliamo usarla.
            Esempio:  nomeFunzione(arg);'],
            ['title' => 'Return', 'definition' => 'Nel corpo della funzione può essere presente l\'istruzione return che consente di terminare e restituire un valore al codice che l\'ha chiamata. Questo ci consente di assegnare ad una variabile il valore restituito da una funzione o utilizzare una funzione all\'interno di una espressione.'],
            ['title' => 'Funzioni di Callback', 'definition' => 'Funzioni Callback:  una "funzione di callback" è una funzione 
            passata come argomento a un\'altra funzione.
            La funzione che riceve la callback può 
            chiamarla in un momento 
            successivo o in una situazione specifica'],
            ['title' => 'Javascript', 'definition' => 'JavaScript è un linguaggio di programmazione che gli sviluppatori utilizzano per realizzare pagine Web interattive'],
            ['title' => 'Scope', 'definition' => 'Lo scope è la porzione di codice delimitata dalle parentesi graffe, quindi non solo quelle delle funzioni, ma ad esempio quelle presenti negli if, o nei cicli for.'],
            ['title' => 'Operatori', 'definition' => 'Gli operatori in JavaScript sono simboli o parole chiave che permettono di eseguire operazioni specifiche tra variabili, costanti o valori letterali.'],
            ['title' => 'Somma: +', 'definition' => 'L\'addizione è un\'operazione matematica in cui si combinano due o più numeri per ottenere un risultato chiamato somma.'],
            ['title' => 'Concatenazione: +', 'definition' => 'La concatenazione è un\'operazione utile per unire due o più stringhe'],
            ['title' => 'Sottrazione: -', 'definition' => 'L\'operatore serve per fare la sottrazione tra due numeri'],
            ['title' => 'Moltiplicazione: *', 'definition' => 'La moltiplicazione è un\'operazione matematica in cui si combinano due o più numeri per ottenere un risultato chiamato prodotto. Ad esempio, nella moltiplicazione di 2 per 3, il prodotto è 6. Si può anche vedere come una forma abbreviata di aggiungere lo stesso numero ripetutamente.'],
            ['title' => 'Divisione: /', 'definition' => 'L\'operatore serve per fare una divisione tra due numeri'],
            ['title' => 'Assegnazione =', 'definition' => 'L\'operatore di assegnamento assegna un valore ad una variabile'],
            ['title' => 'Modulo: %', 'definition' => 'L\'operatore modulo serve per conoscere il resto di una divisione intera.'],
            ['title' => 'Increment: ++', 'definition' => 'L\'operatore  consente di incrementare una variabile numerica di una unità.'],
            ['title' => 'Operatore += ', 'definition' => 'Operatore di assegnamento aggiunge un valore ad una variabile.'],
            ['title' => '(object) Oggetto', 'definition' => 'Gli oggetti sono una struttura dati complessa e vengono utilizzati per catalogare vari tipi di dati. Possono essere creati tramite le parentesi graffe {...}, con un\'opzionale lista di proprietà. Una proprietà è una coppia di “chiave: valore”, dove la “chiave” è una stringa (detta anche “nome di proprietà”), mentre il “valore” può essere qualsiasi tipo di dato. (Esempio: let user = {  
                name: "John", 
                age: 30        
            }; )'],
            ['title' => 'Null', 'definition' => 'Tipo di dato che indica una variabile a cui deliberatamente non è stato assegnato un valore.'],
            ['title' => 'Number Numero ', 'definition' => 'Dato che può rappresentare sia numeri interi che decimali. (Esempio: let a = 3;'],
            ['title' => 'String Stringhe', 'definition' => 'Le stringhe sono dati di tipo "testo". Una stringa è composta da zero o più caratteri scritti tra virgolette. (ES. "ciao", \'ciao\', `${ciao}`)'],
            ['title' => 'Boolean Booleano', 'definition' => 'Tipo di dato che può assumere valore "true" o "false" (Esempio: let example = true'],
            ['title' => 'Undefined Non definito', 'definition' => 'Valore predefinito di una variabile a cui non è stato assegnato nessun valore'],
            ['title' => 'Array', 'definition' => "Rappresenta una lista ordinata di valori. (Esempio: let colors = ['verde', 'giallo, 'rosso' ];"],
            ['title' => 'Array di oggetti', 'definition' => 'Un array di oggetti è una struttura dati che contiene una sequenza ordinata di oggetti. Array = lista ordinata di valori. Array di oggetti = lista ordinata di oggetti. N.B. Gli oggetti all\'interno di un array possono avere proprietà diverse e rappresentare elementi diversi tra loro ma con informazioni correlate.'],
            ['title' => 'Variabili', 'definition' => 'Una variabile è uno “spazio di memoria con nome” utilizzato per salvare dati.'],
            ['title' => 'Let', 'definition' => 'La parola chiave let si utilizza per dichiarare una variabile che si può riassegnare'],
            ['title' => 'Const', 'definition' => 'La parola chiave const si utilizza per dichiarare una costante, ovvero una variabile che non si può riassegnare'],
            ['title' => 'Var', 'definition' => 'La parola chiave var si utilizza per dichiarare una variabile che si può riassegnare. La differenza con let è dato dallo scope'],
            ['title' => 'Arrow Function', 'definition' => 'Sono introdotte in ECMAScript 6 (ES6) e forniscono una sintassi 
            più breve rispetto alle funzioni tradizionali.
            L\'aspetto principale delle arrow function è l\'uso della doppia freccia (=>) 
            per definire la funzione.'],
            ['title' => 'While', 'definition' => 'Il ciclo while inizia valutando la condizione. 
            Se condizione restituisce true, 
            il codice nel blocco delle istruzioni viene eseguito.
            Se condizione restituisce false, il codice nel blocco delle istruzioni 
            non viene eseguito e il ciclo termina.'],
            ['title' => 'Do While', 'definition' => 'Il ciclo do while in JavaScript, così come negli altri linguaggi dove questo costrutto esiste, consente di eseguire le istruzioni almeno una volta.
            Se la condizione è vera allora si ripete nuovamente il ciclo, altrimenti si passa all\'istruzione successiva.'],
            
            //? PHP

            ['title' => 'Server-side/backend', 'definition' => 'I linguaggi server/side sono linguaggi di programmazione che vengono elaborati lato server, il più diffuso è PHP. Il compito principale è quello di interpretare ed elaborare dati provenienti da un database e fornire un riscontro alla componente client/side'],
            ['title' => 'PHP', 'definition' => 'PHP è un acronimo il cui significato è “Hypertext Preprocessor” (in origine nato come “Personal Home Page Tools”).
            Si tratta di un linguaggio di scripting definito "server side", ovvero un linguaggio che risiede in un server in remoto e che interpreta le istruzioni del client, le elabora e le restituisce al client che ha formulato la richiesta.
            PHP è un linguaggio interpretato, ovvero esiste un programma chiamato “interprete” che si occupa di tradurre il codice PHP in un linguaggio comprensibile al computer.'],
            ['title' => 'API', 'definition' => 'L\'acronimo API sta per Application Programming Interface e può essere tradotto come interfaccia di programmazione. Come suggerisce il nome italiano, un\'API consente ai programmatori di accedere a determinate funzioni. Le interfacce servono, per così dire, come punto di accesso.'],
            ['title' => 'MAMP', 'definition' => 'MAMP è acronimo di Macintosh, Apache, MySQL e PHP.
            Grazie ad Apache (Apache HTTP Server), MAMP trasforma il computer in un server locale, su cui girano MySQL e PHP per eseguire una pagina web dinamica nel browser locale.'],
            ['title' => 'Echo', 'definition' => 'echo o \'<?= ?>\' è un costrutto tipico del linguaggio PHP che permette di visualizzare lato cliente una o più stringhe di codice'],
            ['title' => 'var_dump', 'definition' => 'E\' una funzione che permette di stampare in pagina delle informazioni relative ad una variabile. 
            var_dump()'],
            ['title' => 'Null coalescing operator', 'definition' => 'E\' un operatore binario che ci permette di assegnare ad una variabile un valore di default nel caso essa sia nulla o non definita. 
            (??)'],
            ['title' => 'Array associativi', 'definition' => 'Gli array associativi sono degli array i cui elementi sono caratterizzati da una coppia chiave / valore in cui la chiave (o indice) è una stringa.
            L\'associazione tra chiavi e valori viene fatta attraverso l\'operatore di assegnamento =>, ed è possibile riferirsi ad un elemento tramite la sua chiave.'],
            ['title' => 'URL', 'definition' => 'Lo Uniform Resource Locator (URL - "localizzatore uniforme di risorse"), è una sequenza di caratteri che identifica univocamente l\'indirizzo di una risorsa su una rete di computer o presente su un host server e resa accessibile a un client.'],
            ['title' => 'Super Global', 'definition' => 'Variabili che sono sempre accessibili, indipendentemente dallo scope del codice. Esempi includono $_GET, $_POST, e $_SESSION.'],
            ['title' => '__DIR__', 'definition' => 'Fa parte delle "magic constants", in particolare permette di restituire il percorso alla directory che contiene il file che richiama la costante. 
            Utilizzato in PHP per includere o aggiungere nuovi percorsi '],
            ['title' => 'Include/Require', 'definition' => 'Include e Require sono istruzioni che permettono di inserire una parte di codice, o modulo, conservato in un file all\'interno di un altro, in pratica è come se il codice venisse copiato ed incollato \'sottobanco\'. Include e Require sono nella loro funzionalità identiche senonché il primo produrrà solo un avviso (E_WARNING) in caso di errore, mentre il secondo un errore fatale (E-COMPILE-ERROR) che fermerà lo script. '],
            ['title' => 'PHP Sessions', 'definition' => 'La sessione è una funzionalità che ha PHP per conservare informazioni(in variabili) che vengono condivise tra più pagine.'],
            ['title' => 'Redirect', 'definition' => 'Costrutto che permette di indirizzare i visitarori del sito ad una pagina specifica.
            Per fare ciò, utilizziamo il metodo header.
            Fra le parentesi passiamo una stringa che inizia con
            Location: a cui concateniamo l\'indirizzo della pagina su cui
            vogliamo reindirizzare l\'utente.'],
            ['title' => 'JSON Encode/Decode', 'definition' => 'In PHP, la funzione json_encode è utilizzata per convertire una variabile PHP in una stringa JSON, mentre la funzione json_decode converte una stringa JSON in una variabile PHP. Questo è molto utile per scambiare dati tra un server PHP e un\'applicazione JavaScript o tra diversi servizi web che comunicano attraverso JSON.'],
            ['title' => 'CORS', 'definition' => 'Le politiche CORS (Cross-Origin Resource Sharing) sono regole implementate dai browser per consentire o bloccare le richieste di risorse (come API o font) da fonti esterne rispetto al sito web che sta facendo la richiesta. Questo aiuta a proteggere la sicurezza dei dati.'],
            ['title' => 'Variabili di sessione', 'definition' => 'Le variabili di sessione servono come deposito temporaneo per alcune informazioni, quali nomi utente e password o elementi carrello della spesa . Una volta che la sessione è inizializzata, è possibile utilizzare la variabile superglobale $_SESSION per memorizzare variabili di sessione. Questa non è altro che un array associativo, quindi è sufficiente specificare un indice, che sarà il nome della variabile di sessione, e un valore. '],
            ['title' => 'Endpoint', 'definition' => 'Un endpoint è un punto di accesso specifico in un\'API. È una specifica URL (URI) a cui una richiesta può essere inviata per ottenere o inviare dati.'],
            ['title' => 'URI', 'definition' => 'Un URI è una stringa che identifica in modo univoco una risorsa. Può essere un URL (Uniform Resource Locator) o una URN (Uniform Resource Name).'],
            ['title' => 'JSON', 'definition' => 'JavaScript Object Notation'],
            ['title' => 'Query string', 'definition' => 'La query string è una parte di un URL (Uniform Resource Locator)
            che trasporta dati aggiuntivi sotto forma di coppie chiave-valore.'],
            ['title' => 'Postman', 'definition' => 'Postman è uno strumento ampiamente utilizzato per testare API (Application Programming Interface) tramite richieste HTTP. Si tratta di un\'applicazione che fornisce un\'interfaccia utente grafica intuitiva per eseguire, testare e documentare chiamate API.'],

            //? OOP

            ['title' => 'Object-Oriented Programming', 'definition' => 'OOP è l\'abbreviazione di Object-Oriented Programming, programmazione orientata agli oggetti. L\'OOP è quindi un paradigma di programmazione basato sul concetto di oggetti, specifiche strutture di dati all\'interno di una classe.'],
            ['title' => 'Classi oop', 'definition' => 'La classe è la descrizione astratta di un tipo di dato e descrive una famiglia di oggetti con proprietà specifiche'],
            ['title' => 'Istanza', 'definition' => 'Un\'istanza è la concretizzazione dell\'oggetto'],
            ['title' => 'Ereditarietà oop', 'definition' => 'L\'ereditarietà è un caposaldo della programmazione
            orientata agli oggetti. Grazie all\'ereditarietà possiamo definire una classe
            a partire da una classe più generica ed estenderne
            le funzionalità. La classe figlia eredita quindi tutte le
            proprietà e i metodi della classe genitore'],
            ['title' => 'Costruttore', 'definition' => 'Ogni classe ha una funzione particolare, detta costruttore, che permette di eseguire azioni nel momento di inizializzazione della classe, e di passare le proprietà dichiarate dell\'oggetto, nel momento in cui viene istanziato'],
            ['title' => 'Visibilità', 'definition' => 'E\' utilizzata per restringere l\'accesso ai dati e per migliorare il concetto di isolamento e può essere di 3 tipi: public, protected, private.+'],
            ['title' => 'Public', 'definition' => 'I metodi e le variabili public saranno accessibili
            da qualsiasi file o metodo abbia accesso all\'istanza.'],
            ['title' => 'Protected', 'definition' => 'Potranno essere utilizzati all\'interno della classe
            o dalle classi che derivano da essa,
            ma non dall\'esterno della classe.'],
            ['title' => 'Private', 'definition' => 'Potranno essere utilizzati solo all\'interno della classe
            dove sono stati dichiarati'],
            ['title' => 'Static', 'definition' => 'Le proprietà o i metodi con il termine static possono essere chiamati anche senza bisogno che sia stata inizializzata un\'istanza di quell\'oggetto. Viene usata quando le istanze sono tutte uguali'],
            ['title' => 'Composizione', 'definition' => 'Tramite la composizione è possibile utilizzare una classe per costruire un\'altra classe più complessa, creando una relazione di tipo ha-un tra le due classi. Ci permette di riutilizzare classi più complesse per comporre in parte altri oggetti'],
            ['title' => 'Polimorfismo oop', 'definition' => 'La parola polimorfismo indica la possibilità per uno stesso oggetto di assumere più forme.
            Chiameremo il metodo con lo stesso nome,
            ma nell\'istanza della classe figlia avremo un risultato diverso.'],
            ['title' => 'NULLSAFE OPERATOR', 'definition' => 'Lavorando con la composizione, per poter accedere alle proprietà dell\'istanza contenuta nella classe, è necessario verificare che questa sia effettivamente stata definita, in altre parole, che non sia null.'],
            ['title' => 'Trait', 'definition' => 'I trait possono essere usati
            per creare proprietà da applicare a più classi.'],
            ['title' => 'Exception ', 'definition' => 'E\' una classe preimpostata per aiutare il programmatore a gestire eventuali errori'],
            ['title' => 'Scope Resolution Operator(::)', 'definition' => 'L\'operatore di risoluzione dell\'ambito (::) è un token che consente l\'accesso a una proprietà statica costante o a un metodo statico di una classe o di uno dei suoi genitori.'],

            //? VUE

            ['title' => 'Data', 'definition' => 'è un oggetto che rappresenta il modello dati reattivo che viene reso disponibile da Vue.'],
            ['title' => 'Methods', 'definition' => 'I metodi sono le funzioni assegnate agli oggetti. Servono a far eseguire un blocco di codice in risposta a un evento scatenato dall\'utente'],
            ['title' => 'Computed', 'definition' => 'Proprietà definite attraverso delle funzioni che non ricevono argomenti e restituiscono sempre qualcosa, che permettono di manipolare le proprietà di base dell\'oggetto data, restituendo valori che vengono ricalcolati quando una delle proprietà reattive viene modificata.'],
            ['title' => 'Moustache Syntax', 'definition' => 'Sintassi da usare dentro i tag HTML per inserire i dati in modo dinamico. Consiste nell\'aprire e chiudere due parentesi graffe.'],
            ['title' => 'Direttiva', 'definition' => 'Il termine direttiva si riferisce agli attributi del template che iniziano con il prefisso "v-" ad esempio v-for, v-if, vi bind ecc'],
            ['title' => 'Composition API', 'definition' => 'La Composition API è una raccolta di funzioni utilizzate per scrivere componenti in Vue.'],
            ['title' => 'Props', 'definition' => 'In Vue, le props sono attributi personalizzati che puoi registrare su qualsiasi componente. Definisci i tuoi dati sul componente principale e gli dai un valore. Quindi, vai al componente figlio che necessita di tali dati e passi il valore a un attributo prop. Pertanto, i dati diventano una proprietà nel componente figlio.'],
            ['title' => 'SPA ', 'definition' => 'Single Page Application: un\'applicazione composta da un\'unica pagina nella quale cambiano i contenuti in base alla ricerca.'],
            ['title' => 'Option API', 'definition' => 'L\' Options Api è il modo tradizionale di creare componenti Vue. Implica l\'utilizzo di una serie di opzioni, come dati, metodi e proprietà calcolate, per definire il comportamento e lo stato di un componente.'],
            ['title' => 'Componente Dinamico', 'definition' => 'I componenti dinamici in Vue.js possono cambiare in base allo stato corrente dell\'applicazione. Ciò significa che Vue userà il componente appropriato in base, ad esempio, all\'interazione dell\'utente o ad altre condizioni'],
            ['title' => 'Vite', 'definition' => 'Strumento di compilazione e server locale, utile allo sviluppo front-end'],
            ['title' => 'Componenti', 'definition' => 'Moduli contenenti porzioni di codice HTML, colla sua logica JS e le proprietà dello stile CSS. La divisione di codice in moduli consente sia di lavorare su piccole parti di codice, sia in alcuni casi di riutilizzare i componenti stessi in più punti dell\'applicazione o del sito.'],

            //? GIT

            ['title' => 'init', 'definition' => 'Inizializza una nuova repository'],
            ['title' => 'commit', 'definition' => 'Invia una copia del lavoro eseguito nell\'head'],
            ['title' => 'stage', 'definition' => 'Scanerizza il lavoro selezionato e ne salva una copia, che verra poi caricata con il comando "commit"'],
            ['title' => 'push', 'definition' => 'Carica una copia del lavoro in locale sulla repository in GitHub'],
            ['title' => 'branch', 'definition' => 'Ramificazione del progetto principale'],
            ['title' => 'pull', 'definition' => 'Scarica una copia del lavoro dalla repository su GitHub in locale'],
            ['title' => 'merge', 'definition' => 'Prova ad unificare un branch al ramo principale'],


            //? Programmazione

            ['title' => 'Programmazione', 'definition' => 'La programmazione è il processo di ideazione, progettazione e costruzione di programmi informatici eseguibili volti alla risoluzione di problemi. La programmazione è costituita da fasi come l\'analisi e la generazione di algoritmi, lo studio della loro accuratezza e del consumo di risorse, e l\'implementazione di suddetti algoritmi (solitamente in un linguaggio di programmazione), fase nota come scrittura di codice.'],
            ['title' => 'Framework', 'definition' => 'E\' un\'architettura logica di supporto (spesso un\'implementazione logica di un particolare design pattern) sulla quale un software può essere progettato e realizzato, spesso facilitandone lo sviluppo da parte del programmatore.'],
            ['title' => 'Debug', 'definition' => 'Il debugging (o semplicemente debug) o depurazione, consiste nell\'individuare e correggere errori nel codice (bug)'],
            ['title' => 'Libreria', 'definition' => 'Una libreria si compone di un pacchetto di uno o più file volti a fornire metodi aggiuntivi (e magari completi) per lo sviluppo di un applicazione o di un software.'],
            ['title' => 'Diagramma di flusso', 'definition' => 'È una rappresentazione grafica delle operazioni da eseguire per l\'esecuzione di un algoritmo.'],
            ['title' => 'Linguaggio di programmazione', 'definition' => 'Un linguaggio di programmazione è un sistema di notazione per la scrittura di softwer. La descrizione di un linguaggio di programmazione è solitamente divisa nelle due componenti della sintassi (forma) e della semantica (significato), che di solito sono definite da un linguaggio formale.'],
            ['title' => 'Linguaggio di mark-up', 'definition' => 'Un linguaggio di markup è un insieme di regole che descrivono i meccanismi di rappresentazione o d\'impaginazione di un testo '],
            ['title' => 'Cascading Style Sheets', 'definition' => 'Usato per formattare l\'estetica dell\'HyperText Markup Language (HTML) .'],
            ['title' => 'HTML', 'definition' => 'L\'HyperText Markup Language nato per la formattazione e impaginazione di documenti ipertestuali disponibili '],
            ['title' => 'Linguaggi di FrontEnd', 'definition' => 'Tutto ciò che ha a che fare con l\'interfaccia utente'],
            ['title' => 'Directory', 'definition' => 'In informatica, una directory o cartella è una specifica entità del file system che elenca altre entità e che permette di organizzarle in una struttura ad albero. Essa è pertanto definibile come un percorso (o indirizzo o path) o locazione del file system in cui sono presenti file o altre directory. '],
            ['title' => 'Repository', 'definition' => 'Un repository (lett. "deposito" o "ripostiglio"), in informatica, è un ambiente di un sistema informativo (ad esempio di tipo ERP), in cui vengono gestiti i metadati, attraverso tabelle relazionali; l\'insieme di tabelle, regole e motori di calcolo tramite cui si gestiscono i metadati prende il nome di metabase. '],
            ['title' => 'Booleano', 'definition' => 'In informatica, quello booleano è un tipo di dato i cui unici due possibili valori rappresentano il valore di verità in un\'algebra di Boole. Tipicamente questi valori sono indicati con i termini inglesi "true" e "false" (rispettivamente "vero" e "falso") oppure come 1 e 0. Il nome deriva da George Boole. '],
            ['title' => 'Linguaggio di BackEnd', 'definition' => 'Tuttto ciò che ha a che fare con la raccolta dati che fornisce l\'utente'],
            ['title' => 'File', 'definition' => 'Il termine file (dalla lingua inglese, traducibile come "fascicolo" o "archivio") in informatica indica un contenitore di dati, tipicamente collocato in un file system, a sua volta registrato su un supporto di memorizzazione digitale. Il nome deriva dall\'analogia con i sistemi di archiviazione dei dati utilizzati prima dell\'avvento dei sistemi informatici che li sostituirono.'],
            ['title' => 'Variabile', 'definition' => 'Una variabile, in informatica, è un contenitore di dati situato in una porzione di memoria (una o più locazioni di memoria) destinata a contenere valori, suscettibili di modifica nel corso dell\'esecuzione di un programma. Una variabile è caratterizzata da un nome (inteso solitamente come una sequenza di caratteri e cifre). '],
            ['title' => 'Costante', 'definition' => 'In informatica una costante identifica una porzione di memoria il cui valore non varia nel corso dell\'esecuzione di un programma. Le costanti possono essere prevalentemente di tre tipi, costanti numeriche, costanti di carattere oppure costanti di stringhe.[senza fonte] '],
            ['title' => 'Scrollbar', 'definition' => 'In informatica una barra di scorrimento (in inglese scrollbar) è un controllo grafico (widget) con cui testi, immagini, icone, elementi ed altri oggetti visualizzati sullo schermo all\'interno di una finestra del sistema operativo o di una applicazione, possono essere traslati verticalmente o orizzontalmente permettendo all\'utente la visualizzazione completa di tutti i suoi contenuti. L\'utilizzo della barra di scorrimento è detto scrolling ovvero scorrimento della finestr'],
            ['title' => 'Server', 'definition' => 'Un server (dall\'inglese «serviente, servitore, cameriere») in informatica e telecomunicazioni è un dispositivo fisico o sistema informatico di elaborazione e gestione del traffico di informazioni. Un server fornisce, a livello logico e fisico, un qualunque tipo di servizio ad altre componenti (tipicamente chiamate client, cioè clienti) che ne fanno richiesta attraverso una rete di computer, all\'interno di un sistema informatico o anche direttamente in locale su un computer.'],
            ['title' => 'Shortcut', 'definition' => 'Una scorciatoia da tastiera (in inglese keyboard shortcut), in informatica, è la pressione di due o più tasti contemporaneamente che richiamano una certa operazione di un software o del sistema operativo di un PC. Il significato del termine "scorciatoia da tastiera" può variare in relazione al produttore del software'],
            ['title' => 'Codice sorgente', 'definition' => 'In informatica, il codice sorgente (spesso detto sorgente o codice o listato) è il testo di un algoritmo di un programma scritto in un determinato linguaggio di programmazione, compreso all\'interno di un file sorgente, che definisce il flusso di esecuzione del programma stesso, ovvero la sua codifica software. Il codice sorgente, scritto in un linguaggio di programmazione leggibile dagli esseri umani, fornisce indicazioni ai computer affinché questi possano tradurle (compilarle) in linguaggio macchina, costituendo così la base di siti web e programmi. Il processo di compilazione include i link alle librerie di sistema. '],
            ['title' => 'Byte', 'definition' => 'Il byte con i relativi multipli è l\'unità più utilizzata dal grande pubblico. Storicamente, un byte era il numero di bit necessari per codificare un carattere di testo all\'interno di un computer (definizione dipendente quindi dall\'architettura dell\'elaboratore); oggi, tuttavia, assume sempre il significato di otto bit. Un byte può quindi rappresentare 28 = 256 distinti valori, come ad esempio i numeri interi tra 0 e 255, o tra -128 e 127. Lo standard IEEE 1541-2002 stabilisce che "B" (lettera maiuscola) è il simbolo che indica il byte. I Byte, ed i multipli di essi, sono sempre utilizzati per indicare la grandezza di file e la capacità di memorizzazione di computer. '],
            ['title' => 'Log', 'definition' => 'Il termine viene utilizzato per indicare: la registrazione sequenziale e cronologica delle operazioni effettuate da un utente, un amministratore o automatizzate, man mano che vengono eseguite dal sistema o dall\'applicazione; il file o insieme di file su cui tali registrazioni sono memorizzate ed eventualmente accedute in fase di analisi dei dati, detto anche registro eventi.'],
            ['title' => 'Browser', 'definition' => 'In informatica il browser Web (o semplicemente browser /braʊzə(r)/), in italiano navigatore Web,[1] è un\'applicazione per l\'acquisizione, la presentazione e la navigazione di risorse sul Web. Tali risorse (come pagine web, immagini o video) sono messe a disposizione sul World Wide Web (la rete globale che si appoggia su Internet), su una rete locale o sullo stesso computer dove il browser è in esecuzione. Il programma implementa da un lato le funzionalità di client per il protocollo HTTP, che regola il download delle risorse dai server web a partire dal loro indirizzo URL; dall\'altro quelle di visualizzazione dei contenuti ipertestuali (solitamente all\'interno di documenti HTML) e di riproduzione di contenuti multimediali (rendering). Tra i browser più utilizzati vi sono Google Chrome, Mozilla Firefox, Microsoft Edge, Safari, Opera e Internet Explorer.'],
            ['title' => 'Input/output', 'definition' => 'In informatica, con input/output o ingresso/uscita (abbreviato I/O) si intendono tutte le interfacce informatiche messe a disposizione da un sistema operativo ai programmi, per effettuare un cambio o svincolo di dati o segnali. Sono anche i due componenti fondamentali delle operazioni effettuate da un elaboratore: collegate a queste interfacce nell\'interazione con l\'utente ci sono le varie periferiche di I/O.'],
            ['title' => 'Hardware', 'definition' => 'L\'hardware (abbreviato HW, dall\'inglese hard «duro, pesante»,[1] e ware «merci, prodotti», su imitazione del termine software) è l\'insieme di tutte le parti tangibili elettroniche, elettriche, meccaniche, magnetiche, ottiche che consentono il funzionamento di un computer. Più in generale il termine si riferisce a qualsiasi componente fisico di una periferica o di una apparecchiatura elettronica, ivi comprese le strutture di rete; l\'insieme di tali componenti è anche detto componentistica.[2] Il significato è contrapposto a quello di software, che corrisponde alla parte intangibile (non fisica) di un sistema informatico o elettronico. '],
            ['title' => 'Destinazione d\'uso del codice', 'definition' => 'programmazione web, programmazione videogiochi, programmazione per dispositivi mobili etc...'],
            ['title' => 'Software', 'definition' => 'Il software è un programma = insieme di istruzioni che indicano al pc cosa fare!'],
            ['title' => 'Editor', 'definition' => 'Programma di modifica di testo o immagini'],
            ['title' => 'Oggetti', 'definition' => 'Un oggetto è una istanza di una classe. Esso è dotato di tutti gli attributi e i metodi definiti dalla classe, ed agisce come un fornitore di "messaggi" (i metodi) che il codice eseguibile del programma (procedure o altri oggetti) può attivare su richiesta.'],
            ['title' => 'Polimorfismo', 'definition' => 'Nella programmazione ad oggetti, con il nome di polimorfismo per inclusione, si indica il fatto che lo stesso codice eseguibile può essere utilizzato con istanze di classi diverse, aventi una superclasse comune.'],
            ['title' => 'Vue', 'definition' => 'Vue.js è uno dei framevork JavaScript più utilizzati per la realizzazione di interfacce web e single page application. Vue si dedica alla realizzazione di interfacce web reattive che sfruttano il dual-binding tra modello dati e vista. Ciò significa che rende possibile implementare un\'applicazione ragionando in termini di dati, variabili e oggetti, astraendosi rispetto all\'implementazione e aggiornamento del DOM della pagina.'],
            ['title' => 'OOP', 'definition' => 'L\'OOP è quindi un paradigma di programmazione basato sul concetto di oggetti, specifiche strutture di dati all\'interno di una classe. Gli oggetti possono avere caratteristiche individuali (chiamate campi o attributi) pur all\'interno di una struttura condivisa con gli altri oggetti della stessa classe.'],
            ['title' => 'Incapsulamento', 'definition' => 'L\'incapsulamento è la proprietà per cui i dati che definiscono lo stato interno di un oggetto e i metodi che ne definiscono la logica sono accessibili ai metodi dell\'oggetto stesso, mentre non sono visibili ai client. Per alterare lo stato interno dell\'oggetto, è necessario invocarne i metodi pubblici, ed è questo lo scopo principale dell\'incapsulamento.'],
            ['title' => 'Hoisting', 'definition' => 'Processo che interesse la keyword "function" e porta il browser a leggere le dichiarazioni delle funzioni, "issandole" fino in cima alla pagina, prima di eseguire il codice. '],
            ['title' => 'Ereditarietà', 'definition' => 'Il meccanismo dell\'ereditarietà è utilizzato in fase di strutturazione/definizione/pianificazione del software o in successive estensioni e permette di derivare nuove classi a partire da quelle già definite realizzando una gerarchia di classi. Una classe derivata attraverso l\'ereditarietà (sottoclasse o classe figlia) mantiene i metodi e gli attributi delle classi da cui deriva (classi base, superclassi o classi madre); inoltre, può definire i propri metodi o attributi, e ridefinire il codice di alcuni dei metodi ereditati tramite un meccanismo chiamato overriding. Quando una classe eredita da una sola superclasse si parla di eredità singola; viceversa, si parla di eredità multipla.'],
            ['title' => 'SQL', 'definition' => 'SQL è l\'acronimo di Structured Query Language, vale a dire Linguaggio Strutturato di Interrogazione. Interrogazione è qualsiasi intervento su un DB finalizzato al reperimento di dati. I dati individuati attraverso un\'interrogazione (o query) saranno organizzati secondo criteri che possono essere stabiliti'],
            ['title' => 'Separation of Concerns', 'definition' => 'Il principio di separazione delle sezioni, affindandone ognuna a un linguaggio. Esempio: il mark up è affidato all\'HTML lo stile al CSS, la logica a Javascript.'],

            //? SQL


            ['title' => 'Database', 'definition' => 'Un database è una collezione organizzata di dati coerenti. Organizzato in tabelle formate da righe e colonne. (il termine database viene utilizzato anche per riferirsi al DBMS).'],
            ['title' => 'Tabella DB', 'definition' => 'Una tabella di un database è formata da righe (o tuple) e colonne. Le colonne rappresentano la struttura, ossia le caratteristiche del dato da memorizzare. Ogni riga rappresenta un dato inserito.'],
            ['title' => '(R)DBMS', 'definition' => '(Relational) Database Management System è il mezzo tecnologico che permette di gestire la collezione di dati (il database).'],
            ['title' => 'NoSQL', 'definition' => 'Categoria di DBMS che non implementano le regole relazionali (es. MongoDB).'],
            ['title' => 'Transazioni', 'definition' => 'Le transazioni indicano le operazioni che vengono effetuate sui dati. In caso di successo, il risultato delle operazioni deve essere permanente o persistente, mentre in caso di insuccesso si deve tornare allo stato precedente all\'inizio della transazione.'],
            ['title' => 'ACID properties', 'definition' => '1 Atomicità: la transazione è indivisibile nella sua esecuzione e la sua esecuzione deve essere o totale o nulla, non sono ammesse esecuzioni parziali. 2 Coerenza: non devono verificarsi contraddizioni (incoerenza) tra i dati archiviati nel DB. 3 Isolamento: ogni transazione deve essere eseguita in modo isolato e indipendente dalle altre transazioni, l\'eventuale fallimento di una transazione non deve interferire con le altre transazioni in esecuzione. 4 Durabilità: (o persistenza): una volta che una transazione abbia richiesto un commit work, i cambiamenti apportati non dovranno essere più persi.'],
            ['title' => 'Tipologia di dato nei database', 'definition' => 'I database relazionali supportano nativamente diversi tipi di dato: numeri, stringhe. date, ecc.'],
            ['title' => 'Numeri interi', 'definition' => 'TINYINT
                Utilizza solo un byte per salvare numeri che vanno da -128 a 127. Viene utilizzato ad esempio per salvare i valori boolean, proprio perché è il tipo di dato più piccolo possibile
                
                SMALL / MEDIUMINT
                Occupano rispettivamente 2 e 3 bytes
                
                INT
                Utilizza 4 bytes per rappresentare numeri compresi tra -2.147.483.648 e 2.147.483.647
                
                BIGINT
                Corrisponde ad un INT con il doppio di bytes disponibili'],
            ['title' => 'Numeri con la virgola', 'definition' => 'FLOAT(I, D)
                un numero con la virgola da 4 bytes
                
                DOUBLE(I, D)
                un numero con la virgola da 8 bytes
                
                DECIMAL(I, D)
                un double che gestisce gli
                arrotondamenti considerando i numeri
                dal punto di vista finanziario'],
            ['title' => 'Stringhe nel database', 'definition' => 'VARCHAR(numero)
                permette di indicare la lunghezza massima della stringa da
                rappresentare, con il limite di 255 caratteri
                
                TEXT - fino a 65535 caratteri - è usato ad esempio per le descrizioni prodotto
                
                MEDIUMTEXT - 16mb
                
                LONGTEXT - 4.2gb - usato per salvare porzioni di HTML o lunghi testi'],
            ['title' => 'Date nel database', 'definition' => 'DATETIME
                permette di memorizzare data e ora (YYYY-MM-GG HH:II:SS)
                
                DATE
                contiene solo la data (YYYY-MM-GG)
                
                TIME
                contiene solo l\'orario (HH:II:SS)
                
                YEAR
                contiene solo l\'anno (YYYY)
                
                TIMESTAMP
                può avere diversi formati'],
            ['title' => 'Primary key', 'definition' => 'Chiave primaria o identificatore. Ogni tabella deve avere una colonna adibita ad identificatore, cioè un valore diverso per ogni riga inserita, che permetta di individuarla univocamente.'],
            ['title' => 'Attributi', 'definition' => 'NULL / NOTNULL
                indica che la colonna può o non può contenere il valore NULL.
                Se una colonna è NOT NULL e durante il salvataggio non viene passato alcun valore per quella colonna,
                verrà restituito un errore e l\'intera riga non verrà inserita.
                Esempio:
                In un database di un\'anagrafe, la colonna data_di_nascita sarà NOT NULL per indicare che non è possibile salvare nel
                database di una persona senza indicare anche la data di nascita
                
                DEFAULT
                permette di settare un valore di default alla colonna qualora non fosse presente alcun valore al
                momento del salvataggio.
                Esempio:
                Se vogliamo contare il numero di volte in cui un prodotto è stato acquistato, può avere senso avere DEFAULT(0)
                Ad ogni colonna, possiamo assegnare degli attributi
                
                AUTO_INCREMENT
                Il valore della colonna è incrementa ad ogni nuovo record, per questo motivo è utilizzabile solo con le
                colonne di tipo numero.
                Viene utilizzato ad esempio per gli ID: ogni volta che si aggiunge una nuova riga, in automatico l\'ID sarà
                +1 rispetto alla riga precedente.
                
                UNIQUE
                Indica che i valori di quella colonna devono essere unici, ossia non ci può essere alcun valore ripetuto
                all\'interno della colonna.'],
            ['title' => 'Indici', 'definition' => 'Gli indici sono strutture dati che il DBMS può creare per velocizzare la ricerca di dati all\'interno del database. Gli indici possono essere creati su una o più colonne e hanno il compito di presalvare i possibili valori di quella colonna in modo che le ricerche siano più veloci.'],
            ['title' => 'Relazioni db', 'definition' => '1. One to Many (Uno a Molti)
                2. Many to Many (Molti a Molti)
                3. One to One(Uno a Uno)'],
            ['title' => 'Foreign key', 'definition' => 'La foreign key o chiave esterna rappresenta il collegamento tra le due entità. Contiene l\'id del record dell\'altra tabella messa in relazione.'],
            ['title' => 'Funzione SQL', 'definition' => 'si utilizza per :creare e modificare schemi di database, inserire, modificare e gestire dati memorizzati, interrogare i dati memorizzati, creare e gestire strumenti di controllo ed accesso ai dati'],
            ['title' => 'GUI di gestione database', 'definition' => 'Da riga di comando: tramite il comando mysql, Utilizzando gli strumenti forniti da ogni linguaggio di programmazione, Tramite programmi esterni che forniscono un\'interfaccia grafica'],
            ['title' => 'Operatori SQL', 'definition' => 'Uguaglianza = , non con due o tre = , ma solo con uno, Disuguaglianza <> o !=, Minore o minore uguale < o <=, Maggiore o maggiore uguale > o >= '],
            ['title' => 'SELECT', 'definition' => 'L\'istruzione SELECT è un comando di interrogazione che consente di selezionare ed estrarre dati in un database relazionale mediante l\'esecuzione di una query SQL.'],
            ['title' => 'SELECT DISTINCT', 'definition' => 'L\'istruzione SELECT DISTINCT consente di selezionare in una tabella tutti i valori di una colonna eliminando le righe con i valori duplicati.'],
            ['title' => 'WHERE', 'definition' => 'WHERE è una condizione del comando di interrogazione SELECT che permette la selezione delle righe o tuple nel risultato finale. Alla condizione WHERE deve sempre seguire la condizione che permette la selezione dei dati della tabella.'],
            ['title' => 'AND/OR', 'definition' => 'AND e OR permettono di indicare due o più condizionidi WHERE. L\'operatore AND indica che tutte le condizionidevono essere vere, mentre OR indica che ne basta una vera.'],
            ['title' => 'AS', 'definition' => 'La clausola AS(o Alias) è utilizzata nel comando di interrogazione SELECT per cambiare nome ad un campo ( colonna ) di una tabella. La clausola AS deve sempre seguire il nome della colonna e deve sempre essere un nome diverso da quest\'ultimo.'],
            ['title' => 'ON', 'definition' => 'Lo scopo della clausola ON è quello di specificare le condizioni di unione, cioè di definire il modo in cui le tabelle devono essere unite. In particolare, si definisce il modo in cui i record devono essere abbinati.'],
            ['title' => 'JOIN', 'definition' => 'JOIN è il modo con cui si definisce il collegamento tra due tabelle per mezzo di due colonne che sono relazionate in qualche modo.
                Esistono diversi tipi di JOIN:
                
                INNER JOIN è considerata la versione base. -> inserisce tra i risultati solamente i record in cui c\'è perfetta corrispondenza dei dati tra una tabella e l\'altra.
                
                OUTER JOIN ->inserisce tra i risultati anche i record che non hanno alcuna corrispondenza in una delle due tabelle.
                Ci sono due tipi di OUTER JOIN:
                
                LEFT JOIN ->restituisce tutti i valori della tabella di sinistra anche nel caso in cui non ci sia una relazione con la tabella di destra.
                
                RIGHT JOIN ->restituisce tutti i valori della tabella di destra anche nel caso in cui non ci sia una relazione con la tabella di sinistra.'],
            ['title' => 'ORDER BY', 'definition' => 'La clausola ORDER BY è utilizzata nel comando SELECT  per ordinare i record in base a uno o più campi ( colonne ). La clausola ORDER BY è seguita dai campi prescelti per l\'ordinamento, separati tra loro da una virgola. Il primo campo identifica la chiave primaria, il secondo campo la chiave secondaria e così via.'],
            ['title' => 'GROUP BY', 'definition' => 'La clausola GROUP BY divide una tabella in gruppi in base al valore di uno o più attributi. Va indicata dopo FROM o WHERE se presente. Se la clausola GROUP BY ha più attributi in sequenza, vanno separati con una virgola.'],

        ];

        foreach ($words as $word) {
            $new_word = new Word();
            $new_word->title = $word['title'];
            $new_word->slug = Str::slug($word['title']);
            $new_word->definition = $word['definition'];
            $new_word->save();
        }
    }
}
