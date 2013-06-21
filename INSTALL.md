1. Скачать и установить VirtualBox
https://www.virtualbox.org/wiki/Downloads

2. Скачать и установть Vagrant
http://downloads.vagrantup.com/tags/v1.2.2

3. Создать папку для проекта и зайти в неё через консоль

4. В папке выполнить команду vagrant init

5. Создать в ней папку application

6. Содержимое файла Vagrantfile заменить на
<pre>
Vagrant::Config.run do |config|
  config.vm.box = "community_online"
  config.vm.box_url = "https://dl-web.dropbox.com/get/community_online"
  config.vm.network :hostonly, "192.168.33.10"
  config.vm.share_folder "v-data", "/var/www", "./application"
end 
</pre>
3. Склонировать в папку application приложение Community Online
git clone https://github.com/tvp/community.git ./application

4. Выполнить команду
vagrant up -  эта команда скачает образ с настроенным окружением и запустит виртуалку. в первый раз это будет долго из-за скачианя, потом быстро

теперь сайт должен быть доступен по адресу http://192.168.33.10/
что бы работать с БД рекомендую скачать Workbench http://www.mysql.com/products/workbench/
и настроить на работу с хостом 192.168.33.10 под логином root и без пароля

что бы выключить виртуалку вводим vagrant halt