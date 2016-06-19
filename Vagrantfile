Vagrant.configure("2") do |config|

  config.vm.box = "ubuntu/trusty64"
  config.vm.network :forwarded_port, guest: 80, host: 8080
  config.vm.synced_folder "php/", "/var/www/html"
  config.vm.provision :chef_solo do |chef|
    chef.add_recipe "apache2"
    chef.add_recipe "php"
    chef.add_recipe "database"
    chef.json = { :apache => {:default_site_enabled => true}}
    chef.json = { :php => {
      :configure_options => [
        "-with-mysqli",
        "--with-pdo-mysql"
        ]
        }
      }
  end
  config.vm.provision "shell", inline: <<-SHELL
     sudo apt-get install php5-mysql
     mysql -h 127.0.0.1 -u root -psecret < /vagrant/sql/schema.sql
     sed -i 's/APACHE_RUN_USER=www-data/APACHE_RUN_USER=vagrant/' /etc/apache2/envvars
     sed -i 's/APACHE_RUN_GROUP=www-data/APACHE_RUN_GROUP=vagrant/' /etc/apache2/envvars
  SHELL
end
