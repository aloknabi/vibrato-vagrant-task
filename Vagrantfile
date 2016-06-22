Vagrant.configure("2") do |config|
  
  config.vm.box = "ubuntu/trusty64"
  config.vm.network "private_network", ip: "172.16.111.40"

  config.vm.define "web" do |web|

    web.vm.box = "ubuntu/trusty64"

    # Networking
    web.vm.network "private_network", ip: "172.16.111.41"
    web.vm.network :forwarded_port, guest: 80, host: 8081

    # Mapping the php folder to the apache root
    web.vm.synced_folder "php/", "/var/www/html"  

    web.vm.provision :chef_solo do |chef|
      chef.add_recipe "apache2"
      chef.add_recipe "php"
      chef.add_recipe "php::module_mysql"
      chef.add_recipe "apache2::mod_php5"
      chef.json = { 
        :apache => { 
          :default_site_enabled => true,
          :user => "vagrant",
          :group => "vagrant"
        }
      }
    end

    #config.vm.provision "shell", inline: <<-SHELL
      #sudo apt-get -y install php5-mysql
    #SHELL
  end

  config.vm.define "db" do |db|
    db.vm.box = "ubuntu/trusty64"

    db.vm.network "private_network", ip: "172.16.111.42"
    db.vm.network :forwarded_port, guest: 3306, host: 3306

    db.vm.provision :chef_solo do |chef|
      chef.add_recipe "database"
    end

  end


end
