imaginé structure MySQL et MongoDB


# MySQL
## Avantages
- vu en cours ; toute l’équipe est familiarisée avec

## Inconvénients
- beaucoup de tables, notamment relations et listes imbriquées
- requêtes lourdes et complexes
- obligation de définir une longueur max. pour les champs
- BDD pas synchro. entre membres de l’équipe


# MongoDB
# Avantages
- document JSON, éléments imbriqués les uns dans les autres
- fonction « ReplicaSet » pour avoir plusieurs serveurs disposant des mêmes données

## Inconvénients
- toute l’équipe n’est pas familiarisée avec ; nécessite un temps d’apprentissage supplémentaire


puis avons pensé à 3ème solution : Airtable (BDD-like no-code avec gestion par API)


# Airtable
## Avantages
- simple à appréhender et administrer
- un seul serveur (distant) donc synchro.
- structure similaire à MySQL mais facilitée (listes de relations, tri / filtre, taille des champs)

## Inconvénients
- no-code ; seule interface = API via requêtes HTTP(S)
