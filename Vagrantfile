Vagrant.configure("2") do |config|

  config.vm.define "web" do |web|
    web.vm.box = "ubuntu/trusty64"
    # Mapping the php folder to the apache root
    config.vm.synced_folder "php/", "/var/www/html"    
    web.vm.provision :chef_solo do |chef|
      chef.add_recipe "apache2"
      chef.add_recipe "php"
      chef.add_recipe "apache2::mod_php5"
      chef.json = { 
        :apache => { :default_site_enabled => true}
      }
    end
    config.vm.provision "shell", inline: <<-SHELL
      sudo apt-get install php5-mysql
      sed -i 's/APACHE_RUN_USER=www-data/APACHE_RUN_USER=vagrant/' /etc/apache2/envvars
      sed -i 's/APACHE_RUN_GROUP=www-data/APACHE_RUN_GROUP=vagrant/' /etc/apache2/envvars
      sudo service apache2 restart
    SHELL
  end

  config.vm.box = "ubuntu/trusty64"
  
  # Port fowarding for apache
  #config.vm.network :forwarded_port, guest: 80, host: 8080
  
  # Port forwarding for mysql
  #config.vm.network :forwarded_port, guest: 3306, host: 3306

  # Port forwarding for redis server access
  #config.vm.network :forwarded_port, guest: 6379, host: 6379
  

  # Provisioning with chef cookbooks
  config.vm.provision :chef_solo do |chef|
    chef.add_recipe "database"
    chef.add_recipe "redis"
  end

  # Additional provisioning with shell
  # Adding php mysql extension as configure options attributes not working
  # Creating database schema
  # Updating permissions for apache user to work with vagrant synch folder
  config.vm.provision "shell", inline: <<-SHELL
     mysql -h 127.0.0.1 -u root -psecret < /vagrant/sql/schema.sql
  SHELL
end
