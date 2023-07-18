# ManagementWebApp
![example workflow](https://github.com/a2kad/ManagementWebApp/actions/workflows/index.php/badge.svg)
## Projet : Gestion de note de frais
Pour les besoins d’une petite entreprise, vous allez développer une WebApp
permettant de saisir des notes de frais.
## Cette application sera utilisée par différentes personnes :
- Les employés
- La/le gestionnaire de paie
## Les frais seront de différents types
- **frais de repas** : il s’agit des dépenses pour se restaurer ;
- **frais de déplacement** : billets de train, taxi, titre de transport, etc. ;
- **frais de logement** : nuitée dans un hôtel, réservation d’un logement pour un
déplacement professionnel, etc. ;
- **frais kilométriques** : hypothèse où le salarié est contraint d'utiliser son véhicule
personnel à des fins professionnelles ;
- **frais d’habillage**.
## Les frais disposeront également de renseignements obligatoires :
- **la date du paiement** ;
- **le montant du paiement** TTC et HT ;
- **le motif de l’opération** : ex. déplacement chez le client, déjeuner extérieur, achat d’une paire de chaussure de sécurité, etc ….
- **Justificatif** : Photo du ticket, etc …
## La TVA sera différente selon les frais :
- **20%** : Habillage, logement, frais kilométrique.
- **10%** : Déplacement, repas.
## Les employés
Avant de pouvoir rentrer ses notes de frais, l’employé devra au préalable **s’inscrire / s’enregistrer** avec les informations suivantes :
- **Nom**
- **Prénom**
- **Adresse Mail** : Attention pas de possibilité d’avoir 2 fois le même mail dans la Bdd.
- **Numéro de téléphone**
- **Mot de passe**
L’employé devra se connecter à l’aide de son adresse mail et accédera à son espace employé. Il disposera des fonctionnalités suivantes :
### La gestion de ses notes de frais :
- Il pourra voir l’avancement de celles-ci : prise en charge Oui / Non, Annulée …
- Il pourra supprimer ses notes de frais ( Attention, une fois prise en charge pas de possibilité de supprimer la note )
- Il pourra modifier ses notes de frais ( Attention, une fois prise en charge pas de possibilité de modifier la note )
### La création d’une note de frais :
- Avec les renseignements cités ci-dessus
## La/le gestionnaire de paie.
Elle/il disposera d’un compte spécial avec une adresse mail et un mot de passe. Lors de sa connexion, elle/il pourra accéder à une interface de gestion avec les éléments suivants :
- **Consulter** toutes les notes de frais des employés.
- **Valider les notes de frais**. Attention, il faudra une date de validation, ex. prise en charge le 17/07/23
- **Annuler les notes de frais**, avec uniquement les motifs suivants :
  + Non prise en charge
  + Justificatif manquant

**ATTENTION, lors d’une annulation, il faudra donner des indications à l’annulation : ex. manque le ticket de caisse, pas de prise en charge du repas dans un 5 étoiles.**
