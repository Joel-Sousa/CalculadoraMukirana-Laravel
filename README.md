### Versoes
- php 8.3

## Passos

Retirar o .example do arquivo .env.example na raiz

## baixa e atualiza o composer
```bash
composer update
```

## Rodar a keygen 

```bash
php artisan key:generate
```
## Rodar as migrations
```bash
php artisan migrate
```


// Instala o adb
sudo apt update
sudo apt install android-tools-adb android-tools-fastboot
sudo apt install google-android-emulator-installer

// Seta os caminhos para rodar a adb e o projeto
export ANDROID_HOME=$HOME/Android/Sdk
export ANDROID_SDK_ROOT=$ANDROID_HOME
export PATH=$PATH:$ANDROID_HOME/emulator
export PATH=$PATH:$ANDROID_HOME/platform-tools
export PATH=$PATH:$ANDROID_HOME/tools
export PATH=$PATH:$ANDROID_HOME/tools/bin

// Grava
source ~/.bashrc

// Lista as vms existentes
adb devices

// Baixa a lib do native php no projeto laravel
composer require nativephp/mobile

// Instala o nativephp no projeto
php artisan native:install

// Cria o build | sera gerado em CalculadoraMukirana-Laravel/nativephp/android/app/build/outputs/apk/debug/app-debug.apk
php artisan native:build

// Roda o nativephp e emula o apk na avd ou no celular
php artisan native:run

// Lista todos os avd
emulator -list-avds


##
// ver modelo
adb shell getprop ro.product.model

// Ver android
adb shell getprop ro.build.version.release

Android SDK with API 29 or higher

// Limpa o cache do gradle
cd nativephp/android && ./gradlew clean && ./gradlew assembleDebug --stacktrace

// Gera outro apk
/home/joel/Projetos/CalculadoraMukirana-Laravel/nativephp/android/gradlew assembleRelease
./gradlew assembleRelease



### nativephp/android/local.properties colocar o valor do sdk: /home/joel/Android/Sdk

// Talvez seja necessario atualizar o SDK
sudo apt install sdkmanager

sdkmanager --update
sdkmanager "emulator"

// executa a avd
$ ~/Android/Sdk/emulator/emulator -avd Small_Phone
