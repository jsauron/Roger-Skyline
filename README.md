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

**CONFIG**

******************************

***Sources:***
https://wiki.debian.org/fr/NetworkConfiguration

https://www.ssh.com/ssh/copy-id

https://mtodorovic.developpez.com/linux/programmation-avancee/?page=page_12

https://technique.arscenic.org/commandes-linux-de-base/la-gestion-des-utilisateurs/article/ajout-et-suppression-d-utilisateurs

https://www.linode.com/docs/security/authentication/use-public-key-authentication-with-ssh/

https://wiki.debian.org/iptables

https://doc.ubuntu-fr.org/iptables
