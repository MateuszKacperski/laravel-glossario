<?php

namespace Database\Seeders;

use App\Models\Word;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $words = [
            [
                'term' => 'HTML',
                'definition' => "L'HyperText Markup Language nato per la formattazione e impaginazione di documenti ipertestuali disponibili",
                'slug' => 'html',
            ],
            [
                'term' => 'Classi',
                'definition' => "In HTML, il termine 'classe' si riferisce a un attributo utilizzato per assegnare uno o più identificatori a uno o più elementi HTML. Questo attributo consente di definire stili o comportamenti specifici attraverso il foglio di stile CSS o di selezionare elementi specifici utilizzando JavaScript. Per definire una classe si usa far precedere il nome da un semplice punto. Es. .light-blu {color: lightblue} Possono essere attribuite più classi ad un singolo elemento HTML.",
                'slug' => 'classi',
            ],
            [
                'term' => 'Flex',
                'definition' => "Flexbox, 'Flexible Box', è un layout model che offre un modo efficiente per distribuire gli spazi tra gli elementi all'interno di un contenitore e allineare gli elementi in modo flessibile, indipendentemente dalle dimensioni dello schermo e dalla disposizione degli elementi.",
                'slug' => 'flex',
            ],
            [
                'term' => 'Z-index',
                'definition' => "z-index' è una proprietà che determina l'ordine di impilamento degli elementi su uno stesso piano. Questa proprietà viene utilizzata principalmente quando si lavora con elementi sovrapposti all'interno di un layout. Gli elementi con un valore di z-index più alto verranno visualizzati sopra quelli con un valore più basso.",
                'slug' => 'z-index',
            ],
            [
                'term' => 'If',
                'definition' => "if è collegata con una condizione e seguita da un blocco di codice. Se la condizione risulta vera il blocco  di codice viene eseguito una sola volta;",
                'slug' => 'if',
            ],
            [
                'term' => 'Switch',
                'definition' => "lo switch è efficace per ricevere una determinata selezione tra un numero esatto di possibilità. In base al valore di un’espressione, infatti, generalmente una variabile o l’invocazione a una funzione, viene eseguito uno tra diversi blocchi di codice contrassegnati dalla parola chiave case. ",
                'slug' => 'switch',
            ],
            [
                'term' => 'JSON Encode/Decode',
                'definition' => "In PHP, la funzione json_encode è utilizzata per convertire una variabile PHP in una stringa JSON, mentre la funzione json_decode converte una stringa JSON in una variabile PHP. Questo è molto utile per scambiare dati tra un server PHP e un'applicazione JavaScript o tra diversi servizi web che comunicano attraverso JSON.",
                'slug' => 'json-encode-decode',
            ],
            [
                'term' => 'Null coalescing operator',
                'definition' => "E' un operatore binario che ci permette di assegnare ad una variabile un valore di default nel caso essa sia nulla o non definita. (??)",
                'slug' => 'null-coalescing-operator',
            ],
            [
                'term' => 'Props',
                'definition' => "In Vue, le props sono attributi personalizzati che puoi registrare su qualsiasi componente. Definisci i tuoi dati sul componente principale e gli dai un valore. Quindi, vai al componente figlio che necessita di tali dati e passi il valore a un attributo prop. Pertanto, i dati diventano una proprietà nel componente figlio.",
                'slug' => 'props',
            ],
            [
                'term' => 'Componenti',
                'definition' => "Moduli contenenti porzioni di codice HTML, colla sua logica JS e le proprietà dello stile CSS. La divisione di codice in moduli consente sia di lavorare su piccole parti di codice, sia in alcuni casi di riutilizzare i componenti stessi in più punti dell'applicazione o del sito.",
                'slug' => 'componenti',
            ],
            
        ];

        foreach($words as $word) {
            $new_word = new Word();
            $new_word->term = $word['term'];
            $new_word->definition = $word['definition'];
            $new_word->slug = $word['slug'];

            $new_word->save();
        }
    }
}
