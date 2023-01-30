# MonSalonline coiffure

## Un salon de coiffure souhaite permettre à ses clients de prendre rendez-vous en ligne

![alt text](https://simplonline.co/_next/image?url=https%3A%2F%2Fsimplonline-v3-prod.s3.eu-west-3.amazonaws.com%2Fmedia%2Fimage%2Fpng%2F42bee9c2-2aad-4eb9-8c9a-82d6d260b828.png&w=1280&q=75 "Logo Title Text 1")

Contexte du projet
Un salon de coiffure souhaite permettre à ses clients de prendre rendez-vous en ligne. Chaque rendez-vous dure une heure. Le client veut une interface «user friendly» accessible sure toute platforme et qui respecte les bon normes du UX et UI

Avant de prendre un rendez-vous le client doit s’enregistrer en fournissons son nom, son prénom et son numéro de téléphone . Une fois enregistrer L'utilisateur reçoit une référence unique l'identifiant dans la base de données et lui permettant de créer, suivre l'état de son RDV, le changer ou l’annuler.

Une fois authentifier (en utilisant la référence unique) l’utilisateur sera diriger vers une page qui affiche les créneaux disponibles. L’utilisateur donc peut sélectionner une date et heure libre pour réserver. (un message sera lui afficher pour indiquer que le rendez-vous est bien enregistré.), il pourra aussi modifier ou annuler sa réservation

Les horaires d’ouverture du salon sont comme suit :

• Du lundi au jeudi et le samedi, de 9h à 12h puis de 14h à 20h

• Le vendredi, de 9h à 12h puis de 16h à 22h

• Le dimanche, de 9h à 12h

​

Backoffice (Optionnel): Une page comprenant un calendrier et un emploi du temps des rendez-vous pris. En sélectionnant un jour sur le calendrier l’administrateur peut afficher les informations des rendez-vous du jour (horaire, nom du client, téléphone du client).

Cliquer sur le numéro de téléphone doit permettre de l’appeler (si la page est affichée sur mobile).

Technologies utilisées :

Backend API en PHP respectant l'architecture MVC

Frontend en VueJS/ReactJS ou en JavaScript natif

Bonus:

• Cote Operateur : Une pile de rendez-vous de la journée, avec un bouton pour valider le rendez-vous et passer au client suivant et un autre pour annuler le rendez-vous et passer au client suivant. À la fin de la journée, la page affichera les revenus de la journée.

• Envoi automatique d’un message de confirmation au client lui rappelant : le nom du salon, l’adresse et l’heure du rendez-vous.

• L’administrateur peut annuler un rendez-vous (ce qui rend le créneau horaire à nouveau disponible) • Le message de confirmation envoyé au client comprend un lien qui lui permet d’annuler son rendez-vous. • L’administrateur peut désactiver des créneaux.

• Empêcher (du mieux possible) un même client de réserver plusieurs créneaux dans la même journée.

• L’administrateur peut modifier les horaires d’ouvertures (en gardant des heures pleines)
