# NsXpress Dokumentation

![NsXpress](https://i.imgur.com/w38D3Jk.png)

Velkommen til den officielle dokumentation for NsXpress, den mest brugervenlige og intuitive avisplatform til Netstation fan-sider.

Dette system giver dig mulighed for at administrere forskellige aspekter af din fanside problemfrit.

Udforsk funktionerne nedenfor:

- :fire: **Artikler** 
- :fire: **Kategorier** 
- :fire: **Ting / Prissystem** 
- :fire: **Community system**
- :fire: **Klassisk tagwall i realtid**
- :fire: **Mønt + Onlinetid system**
- :fire: **Figurer / Avatars + Butiksystem**
- :fire: **Kasino**

Og meget, meget mere.

## Krav
> PHP >= 8.1 & Grundlæggende kendskab til Laravel

## Licens

NsXpress er open-source-software licenseret under MIT-licensen.

For at få tilladelse til at bruge dette system frit og gøre det tilgængeligt, er det afgørende at opretholde linket og teksten vedrørende NsXpress OS i hjemmesidens footer. Dette krav er ufravigeligt og må ikke fjernes.

## Installation

1. Klon repositoriet ved hjælp af git:

```bash
git clone https://github.com/NsXpress/NsXpress.git
```

2. .ENV

Dupliker filen .env.example og omdøb den til .env.

Sørg for at udfylde .env-filen med nøjagtige oplysninger om dit domæne, database osv.

Værdierne for ADMIN_ og BOT_ bestemmer brugeren for den første "super admin" med en redaktørrolle og brugernavnet, som systemets bot vil operere under.

3. Installer Composer-afhængigheder:

```bash
composer install
```

4. Migration

Kør følgende kommandoer for at opsætte database-tabeller, seede data osv.

```bash
php artisan migrate
php artisan db:seed
```

Efterfølgende skal denne kommando køres:

```bash
php artisan shield:install --only
```

Den vil bede om tilladelse til at offentliggøre pakkens konfigurationer og migrationer.

Svar med "yes."

Derefter vil den bede om tilladelse til at udføre en frisk installation af pakken.

Svar med "no."

Efterfølgende skal følgende kommando køres:

```bash
php artisan shield:generate --all
```

5. NPM

Det sidste trin er at installere NPM-krav og kompilere de nødvendige JavaScript- og CSS-filer.

Kør følgende kommandoer:

```bash
npm install
npm run prod
```

6. Storage

Kør følgende kommando for at symlinke storage mappen til public:

```bash
php artisan storage:link
```

7. Færdig!

Systemet er nu sat op, og du kan begynde at konfigurere resten af avisen gennem adminpanelet.

For at få adgang til adminpanelet skal du gå til *{dit-domæne.dk}/qwerty*, hvor du vil blive mødt af en loginside.
