/*-------------------------------------------------------------------------------------------------------
Projeto : PTI2020A                           Cliente      : UNOPAR
Autor   : Michel Henrique Staub Pech         Data Criação : 30/04/2020
Módulo  : Mapa                               Função       : Exibição e tratamento de API de mapa
API     : TOMTOM Maps                        Chave API    : 8skVxIvn2gaaXKXKf9lGRlNQzezYYm3v
-------------------------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------
---> Variáveis de permissão de acesso a localização do navegador <---
-------------------------------------------------------------------------------------------------------*/

var messageBox = document.querySelector('.js-message-box');
var messageBoxContent = document.querySelector('.tt-overlay-panel__content');
var messageBoxClose = messageBox.querySelector('.js-message-box-close');

var messages = {
                permissionDenied: 'Permission denied. You can change your browser settings' +
                                  'to allow usage of geolocation on this domain.',
                notAvailable: 'Geolocation data provider not available.'
};

/*-------------------------------------------------------------------------------------------------------
---> Cria mapa <---
-------------------------------------------------------------------------------------------------------*/
var map = tt.map({key: '8skVxIvn2gaaXKXKf9lGRlNQzezYYm3v',
                  container: 'map',
                  style: 'tomtom://vector/1/basic-main'
});

map.addControl(new tt.FullscreenControl());

/*-------------------------------------------------------------------------------------------------------
---> Instância do metodo para controle de geolocalização <---
-------------------------------------------------------------------------------------------------------*/
var geolocateControl = new tt.GeolocateControl({positionOptions: {enableHighAccuracy: false}});

/*-------------------------------------------------------------------------------------------------------
---> Controles de permissão de acesso a localização do navegador <---
-------------------------------------------------------------------------------------------------------*/  
bindEvents();
handlePermissionDenied();

map.addControl(geolocateControl);

function handlePermissionDenied() {
  if ('permissions' in navigator) {
      navigator.permissions.query({name: 'geolocation'})
      .then(function(result) {
        if (result.state === 'denied') {
          displayErrorMessage(messages.permissionDenied);
        }
      });
  }
}

function bindEvents() {
  geolocateControl.on('error', handleError);
  messageBoxClose.addEventListener('click', handleMessageBoxClose);
}

function handleMessageBoxClose() {
  messageBox.setAttribute('hidden', true);
}

function displayErrorMessage(message) {
  messageBoxContent.textContent = message;
  messageBox.removeAttribute('hidden');
}

function handleError(error) {
  switch (error.code) {
  case error.PERMISSION_DENIED:
    displayErrorMessage(messages.permissionDenied);
      break;
  case error.POSITION_UNAVAILABLE:
  case error.TIMEOUT:
    displayErrorMessage(messages.notAvailable);
  }
}
