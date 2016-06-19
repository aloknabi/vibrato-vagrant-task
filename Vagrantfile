Vagrant.configure("2") do |config|

  config.vm.box = "ubuntu/trusty64"
  config.vm.network :forwarded_port, guest: 80, host: 8080
  config.vm.provision :chef_solo do |chef|
    chef.add_recipe "apache2"
    chef.json = { :apache => {:default_site_enabled => true}}
  end
end
