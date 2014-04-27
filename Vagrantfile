hostname = "jeopardy"
base_box_url = "http://nas/shares/Media/Software/Vagrant%20Boxes/jeopardy.box"
base_box_md5 = "ba833676e3e6fb1fecd42d14b32b04dd"
ram = 128

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = hostname
  config.vm.box_url = base_box_url
  config.vm.box_download_checksum = base_box_md5
  config.vm.box_download_checksum_type = "md5"
  config.vm.hostname = hostname
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.provision :shell, :path => "bootstrap.sh"
  
  config.vm.provider "virtualbox" do |v|
    v.customize ["modifyvm", :id, "--name", hostname]
    v.memory = ram
  end
end
