# blog-template - Gael - Mickael - Thomas - Marlone

/****** EXERCICE PAR GROUPE DE 4 ******/

Stockage : mysql (cours le 18/05 matin)

Tout en respectant le principe du MVC 2 strict, réaliser un blog.
Un blog est une liste d'articles que les utilisateurs peuvent commenter.
Un article se défini de cette façon :
un identifiant unique
un titre
un contenu
un auteur (pour le moment une chaine de caractere)
une date de création
Seuls les administrateurs peuvent manipuler des articles

Un commentaire se défini de cette façon :
un identifiant unique
un content
un auteur
une date de création
l'identifiant de l'article commenté
Tous les utilisateurs inscrits peuvent écrire un commentaire
Tous les utilisateurs inscrits peuvent modifier leurs commentaires
Les administrateurs peuvent modifier et/ou supprimer le commentaire de n'importe quel utilisateur

Vous DEVEZ produire un schéma de l'architecture MVC
Un formulaire d'inscription et de connexion sont obligatoires

Les articles et les commentaires sont visibles par tout le monde (connecté ou non)

Pour le moment la seule étape que vous ne pouvez pas réaliser dans les fichiers de traitement est l'étape 3
Dans les autres fichiers c'est la récupération des informations qui sera pour le moment impossible

Astuces :
Garder votre schéma à jour
Séparez vous les tâches directement via le schéma (quitte à écrire les noms dessus)
Créer un repository sur github
Inviter les membres du groupe (et moi)
Mettez (ensemble) le projet git sur toutes les machines (et vérifiez bien que ça marche avant de vous lancer)
Récupérer la structure mvc d'un membre et la push (ça sera la base du projet)