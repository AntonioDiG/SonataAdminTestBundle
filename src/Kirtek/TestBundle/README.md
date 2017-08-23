# Kirtek TestBundle

## Informazioni

Il database impiegato è **MySQL**, con il nome **symfony_dev** ed utente **symuse**.

La versione di Symfony è la 2.8.*x* e quella di Sonata la 3.*x*.

## Funzionalità

La dashboard fornisce le funzionalità per la creazione e l'eliminazione di Fatture e le loro righe.

Le righe delle fatture(nell'applicazione sono definite dalle istanze dell'entità **RigaFattura**) sono associate in modo *molti ad uno* alle entità Fatture(definite come istanze dell'entità **Fattura**).

I campi dell'entità Fattura sono:

| Nome | Tipo | Note |
| :-: | :-: | --: |
| id | integer | Autogenerato |
| data | datetime |  |
| numero | integer |  |
| id_cliente | integer |  |

I campi dell'entità RigaFattura sono:

| Nome | Tipo | Note |
| :-: | :-: | --: |
| id | integer | Autogenerato |
| id_fattura | integer | Associazione molti ad uno all'entità Fattura |
| descrizione | text |  |
| quantita | integer | Sempre maggiore di zero |
| importo | decimal(12,2) |  |
| importo_iva | decimal(12,2) | Assunto come valore percentuale dell'imposta sull'importo di default è 22(IVA italiana); Come valore massimo assume 100, ossia il 100% dell'importo del prodotto. |
| totale | decimal(12,2) |  |

L'importo totale viene calcolato all'atto della creazione di ciascuna istanza.

L'entità RigaFattura ha come valori di default:
* Quantità: 1;
* Importo: 0;
* Importo IVA: 22;
* Descrizione: '' (ossia nulla);
* Totale: 0 (ricavato dall'importo e dall'Iva);
