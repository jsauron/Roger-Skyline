***Roger-Skyline***
Creation de VM et Administration Systèmes et Réseaux.
--

**Creation de la Virtual Machine** 

Télécharger l'image ISO debian via:
https://cdimage.debian.org/debian-cd/current/amd64/iso-cd/
* -> https://cdimage.debian.org/debian-cd/current/amd64/iso-cd/ (dernière version à l'aout 2019)
****************************
Télécharger VirtualBox
Ouvrir VirtualBox et cliquer sur new :
* -> nom de votre vm
* -> Linux
* -> Debian 64
Continuer, accepter la memory size proposée
* -> Create a virtual hard disk now
* -> VDI
* -> Dynamically allocated 
//Meme si vous choisisez une taille de memoire precise elle reste virtuel et sera aloué au fur et a mesure que vous necessiterez de memoire suplementaire,
//c'est ce qu'on appelle une allocation dynamique

Continuer

Rentrer le path vers votre image ISO telecharger precedement

* ex : /Users/*user*/Downloads/debian-10.0.0-amd64-netinst.vdi
* ->selectionner une taille de 8.00GB

Une fois votre VM creee vous pouvez la configuer dans settings:
* ->settings->network->attached to "Bridged Adapter"

Start la VM
************************
**INSTALATION**

Choisir "install"
Laisser le hostname par defaut
domaine name -> "mydomain" par exemple ou skip
choisir un password root
creer un user non-root, choisir son nom et son password

*Partitioner le disk*
* -> Manual 
* -> VBOX HARDDISK -> yes
1. -> free space-> create a new partition-> 4.2 GB-> logical-> beginning-> Use as : Journaling file sys -> Mount point : '/'-> done setting up the partition
2. -> free space-> create a new partition-> 3.4 GB-> logical-> beginning-> Use as : Journaling file sys -> Mount point : '/home'-> done setting up the partition
3. -> free space-> create a new partition-> ~1.0 GB-> logical-> beginning-> Use as : Swap Area -> done setting up the partition
//La swap area est un espace de stockage utilisé pour décharger la mémoire vive physique (RAM) de votre ordinateur lorsque celle-ci arrive à saturation

Finish partitioning and write changes to disk ->yes

*******************************

***CONFIG***

* -> 'su' pour se connecter en tant que root
* -> 'apt-get update' et 'apt-get upgrade' permet de mettre a jour les packages
* -> 'apt-get install sudo + ssh -y' // le flag -y permet d'accepter automatiquement l'installaton
* -> 'sudo usermod -aG sudo 'user-name'' // inscrit le user dans le sudo groupe, verifier le file 'vi /etc/sudoers'

* -> 'sudo vi /etc/network/interfaces' // accede au fichier interfaces + d'info 'man interfaces'
DHCP : methode dynamique de configuartion reseau, via le protocole DHCP on se voit attribuer une adresse IP automatiquement.
L'avantage avec ce protocole c'est que l'on evite les conflit.
Dans notre cas nous allons configurer manuelement notre IP static avec un masque /30 (demandé dans le sujet)

On ne modifie pas le loopback interface
on configure donc notre reseaux comme tel :
    "
   
      address ***.***.***.*** (IP adresses)
      netmask 255.255.255.252
      broadcast ***.***.255.255
      gateway  **.**.254.254
      
      

* -> 'ip a' affiche l'adresse IP //voir man ip
* -> 'sudo reboot' //mettre a jour les modifications

* -> 'ip r' //affiche la configuration du reseau

********************************

***SSH***

*Sur ma Vm (coté serveur)*

* -> 'sudo vi /etc/ssh/sshd_config"
* -> décommenter le "port 22" et le remplacer par un numero de port libre, le fichier /etc/services aide
* -> décommenter "publickey authentification - yes" //impose l'acces via une public key
* -> "permitrootlogin - no" // empecher les conxion en root au serveur

* -> 'sudo servce ssh restart'  //redemmare le service avec les configurations à jour

*Sur mon terminal (coté client)*

* -> 'ssh-keygen' (genere une key)
* -> creer une passphrase
* -> 'ssh-copy-id -i ~/.ssh/id_rsa.pub user-name@ipadress -p numerodeport' install la public key sur le serveur (vm).
* -> ssh username@ipadress -p numero de port' //connexion securisé a votre serveur en ssh


******************************

***Sources:***

https://wiki.debian.org/fr/NetworkConfiguration

https://www.ssh.com/ssh/copy-id

https://mtodorovic.developpez.com/linux/programmation-avancee/?page=page_12

https://technique.arscenic.org/commandes-linux-de-base/la-gestion-des-utilisateurs/article/ajout-et-suppression-d-utilisateurs

https://www.linode.com/docs/security/authentication/use-public-key-authentication-with-ssh/

https://wiki.debian.org/iptables

https://doc.ubuntu-fr.org/iptables

https://sebsauvage.net/comprendre/tcpip/

https://lea-linux.org/documentations/Iptables

https://debian-facile.org/viewtopic.php?id=16380

https://www.quennec.fr/book/export/html/262

https://opensource.com/article/18/10/iptables-tips-and-tricks

https://javapipe.com/blog/iptables-ddos-protection/

https://wiki.debian-fr.xyz/Portsentry

https://web.developpez.com/tutoriels/creer-serveur-web-nginx-php-mariadb/#LIII-A

https://openclassrooms.com/fr/courses/1401411-creer-son-forum-de-toutes-pieces/1401751-inscription-et-connexion
