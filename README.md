# TP 3 PHP : suivi des notes des apprenants

**Nom :** Ettousy  
**Prénom :** Saad  
**Filière :** Informatique appliquée  
**Module :** Programmation web 2  

## Réponses aux questions théoriques

### Constantes

**Que se passe-t-il si on affiche une constante qui n'est pas définie ?**  
PHP affiche une erreur indiquant que la constante n'est pas définie. En PHP récent, le script s'arrête si cette erreur n'est pas gérée.

**Quelle est la différence entre `const` et `define()` ?**  
`const` déclare une constante directement dans le code. `define()` crée une constante en appelant une fonction pendant l'exécution du script.

### Instruction `switch`

**Que se passe-t-il si on oublie `break` dans un `case` ?**  
L'exécution continue dans les instructions des `case` suivants jusqu'à rencontrer un `break` ou la fin du `switch`.

### Boucles

**Quelle est la différence essentielle entre `while` et `do-while` ?**  
`while` vérifie la condition avant d'exécuter le bloc. `do-while` exécute le bloc une première fois, puis vérifie la condition.

### Tableaux

**Quelle fonction utiliser pour trier un tableau indexé comme `$modules` ?**  
On peut utiliser `sort()`. Elle trie les valeurs par ordre croissant et réattribue des indices numériques.

**Quelle différence entre `$a + $b`, `$a == $b` et `$a === $b` ?**  
- `+` réunit les tableaux. Si une clé existe dans les deux, la valeur du tableau de gauche est gardée.
- `==` vérifie que les tableaux ont les mêmes paires clé-valeur, sans tenir compte de leur ordre.
- `===` vérifie aussi que les types et l'ordre des éléments sont identiques.

Dans l'exemple de l'exercice, `$a + $b` donne `$a`, `$a == $b` vaut `true` et `$a === $b` vaut `false`, car les éléments ne sont pas dans le même ordre.

### Inclusion de fichiers

**Quelle différence entre `include` et `require` si le fichier n'existe pas ?**  
`include` affiche un avertissement, puis le script continue. `require` provoque une erreur et arrête le script.

**Que remarque-t-on avec `include` et `include_once` ?**  
`include` peut afficher le contenu du fichier chaque fois qu'il est appelé. `include_once` ne l'inclut qu'une seule fois, même s'il est appelé plusieurs fois.

### Formulaires

**Pourquoi préférer POST à GET pour un mot de passe ?**  
Avec GET, les données apparaissent dans l'adresse de la page. POST ne les met pas dans l'URL. Toutefois, POST ne chiffre pas les données : une connexion HTTPS reste nécessaire.

**Que contient `$_REQUEST` ?**  
Selon la configuration de PHP, ce tableau peut contenir les valeurs reçues par GET, POST et les cookies.

### Fichiers CSV

**Que se passe-t-il avec le mode `"w"` au lieu de `"a"` ?**  
Le mode `"w"` vide le fichier avant d'écrire. Le mode `"a"` ajoute les nouvelles données à la fin du fichier.

**Quels sont les avantages et les inconvénients de `fgetcsv()` et de `fgets()` avec `explode()` ?**  
`fgetcsv()` sépare les champs CSV et tient compte des champs entre guillemets. `fgets()` avec `explode()` est simple, mais peut mal lire un champ contenant un point-virgule ou des guillemets.

### Sérialisation

**Quelle différence entre `serialize()` et `json_encode()` ?**  
`serialize()` produit un format surtout destiné à PHP. `json_encode()` produit du JSON, un format texte utilisé par plusieurs langages.

**Quel format est directement exploitable par JavaScript ?**  
JSON est directement exploitable par JavaScript.

### Sessions et cookies

**Où sont stockés une session et un cookie ?**  
Les données de session sont stockées sur le serveur. Un cookie est stocké dans le navigateur de l'utilisateur.

**Pourquoi `setcookie()` et `header()` doivent-ils être appelés avant tout affichage ?**  
Ces fonctions envoient des en-têtes HTTP. PHP doit les envoyer avant le contenu de la page ; après un affichage, les en-têtes peuvent déjà être partis.
