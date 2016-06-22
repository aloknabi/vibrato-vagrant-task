Vagrant.configure("2") do |config|
  
  config.vm.box = "ubuntu/trusty64"
  config.vm.network "private_network", ip: "192.168.111.40"

  config.vm.define "web" do |web|

    web.vm.box = "ubuntu/trusty64"
    #web.vm.network "private_network", ip: "192.168.111.41"

    # Mapping the php folder to the apache root
    #web.vm.synced_folder "php/", "/var/www/html"  

    web.vm.provision :chef_solo do |chef|
      chef.add_recipe "apache2"
      chef.add_recipe "php"
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
      #sudo apt-get install php5-mysql
      #sed -i 's/APACHE_RUN_USER=www-data/APACHE_RUN_USER=vagrant/' /etc/apache2/envvars
      #sed -i 's/APACHE_RUN_GROUP=www-data/APACHE_RUN_GROUP=vagrant/' /etc/apache2/envvars
      #sudo service apache2 restart
    #SHELL
  end

  #config.vm.define "db" do |db|
    #web.vm.box = "ubuntu/trusty64"

  #end


end
