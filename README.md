# Roger-Skyline
Creation de VM et Administration Systèmes et Réseaux.

Télécharger l'image ISO debian via:
https://cdimage.debian.org/debian-cd/current/amd64/iso-cd/
-> https://cdimage.debian.org/debian-cd/current/amd64/iso-cd/ (dernière version à l'aout 2019)

Télécharger VirtualBox
Ouvrir VirtualBox et cliquer sur new :
-> nom de votre vm
-> Linux
-> Debian 64
Continuer, accepter la memory size proposée
-> Create a virtual hard disk now
-> VDI
-> Dynamically allocated 
//Meme si vous choisisez une taille de memoire precise elle reste fictive et sera aloué au fur et a mesure que vous necessiterez de memoire suplementaire,
//c'est ce qu'on appelle une allocation dynamique
Continuer
Rentrer le path vers votre image ISO telecharger precedement
ex : /Users/*user*/Downloads/debian-10.0.0-amd64-netinst.vdi
->selectionner une taille de 8.00GB

Une fois votre VM creee vous pouvez la configuer dans settings:
->settings->network->attached to "Bridged Adapter"

Start la VM

#INSTALATION

Choisir "install"

