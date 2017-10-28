Vagrant.configure("2") do |config|
	config.vm.box = "ubuntu/trusty64"
	config.vm.provision "shell", path: "bootstrap.sh"
	config.vm.synced_folder "ref-au/", "/var/www/ref-au",
		owner: "www-data",
		group: "www-data"
	config.vm.network "private_network", type: "dhcp"
#	config.vm.network "forwarded_port", guest: 80, host: 8080

	config.vm.provider "virtualbox" do |vb|
#		vb.gui = true
		vb.memory = "1024"
	end
end
