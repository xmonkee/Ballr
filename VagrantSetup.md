Vagrant setup - puphpet.com


#Have an existing PuPHPet-generated manifest? 
Just drag your puphpet/config.yaml file into your browser and the form will be filled in with your previous values! 


#IP
192.168.2.50

#Services
Port 		Service
22		ssh
9000 	xdebug
1080	MailCatcher

#Other Services
http://Server_IP_address/adminer	Adminer

#Server Name
ballr.com
www.ballr.com

#Port mapping
Server	Host
80		8888


#Scripts
sql loaded via app/databases/scripts/states.sql
composer and migration via phphpet/files/exec-always/bootstrap.sh

dotfiles

You can add all your dot files (.bash_aliases, .vimrc, .gitconfig, etc), to the puphpet/files/dot/ folder that will appear after you extract your generated zip file.

During initial startup, they will automatically be copied into the VM. There is a sample .bash_aliases file there for you to start with - overwrite at will!

Script files

You can run your own custom code after the VM finishes provisioning by adding files to the puphpet/files/exec-always and puphpet/files/exec-once folders.

Files are executed in alphabetical order. Files within exec-once are run before files within exec-always.

Files within exec-always will run on initial $ vagrant up and all $ vagrant provision, while files within exec-once will run only the first time you run Vagrant, unless you SSH into the VM and remove the /.puphpet-stuff/exec-once-ran file and re-run Vagrant.

                     
