# -*- mode: ruby -*-
# vi: set ft=ruby :



Vagrant.configure("2") do |config|

  config.vm.box = "ubuntu-precise12042-x64-vbox43"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"
  config.vm.provision :shell, :path => "bootstrap.sh"
  config.vm.provision :shell, :path => "changes.sh"

  config.vm.network :forwarded_port, host: 8888, guest: 80
 
  config.vm.synced_folder "./", "/vagrant", id: "vagrant-root" , :owner => "vagrant", :group => "www-data"

  config.vm.synced_folder "./app/storage", "/vagrant/app/storage", id: "vagrant-storage",
        :owner => "vagrant",
        :group => "www-data",
        :mount_options => ["dmode=775","fmode=664"]

  config.vm.synced_folder "./public", "/vagrant/public", id: "vagrant-public",
        :owner => "vagrant",
        :group => "www-data",
        :mount_options => ["dmode=775","fmode=664"]

end
