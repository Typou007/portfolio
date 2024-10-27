// Classe Youtube pour intégrer des vidéos YouTube
export default class Youtube {
  constructor(element) {
    this.element = element;

    // Sélectionne les éléments nécessaires de la vidéo YouTube
    this.youtubeContainer = this.element.querySelector('.js-youtube');
    this.poster = this.element.querySelector('.js-poster');
    this.youtubeId = this.element.dataset.youtubeId;

    // Détermine si la lecture automatique est activée en fonction de la présence de 'data-action'
    this.actionPlay = this.element.dataset.action !== undefined;
    this.autoplay = this.actionPlay ? 1 : 0;

    this.playerReady = false;

    // Ajoute cette instance à la liste des instances de Youtube
    Youtube.instances.push(this);

    // Charge le script de l'API YouTube si nécessaire
    if (this.youtubeId) {
      Youtube.loadScript();
    } else {
      console.error('Vous devez spécifier un ID de vidéo YouTube.');
    }

    // Options par défaut pour la vidéo YouTube
    this.options = {
      rel: 1, // Affiche les vidéos suggérées à la fin de la lecture
      controls: 1, // Affiche les contrôles de lecture
      autoplay: this.autoplay, // Lecture automatique si 'data-action' est présent
      loop: 0, // Désactive la boucle par défaut
    };
  }

  // Charge le script de l'API YouTube une seule fois
  static loadScript() {
    if (!Youtube.scriptLoaded) {
      Youtube.scriptLoaded = true;

      const script = document.createElement('script');
      script.src = 'https://www.youtube.com/iframe_api';
      document.body.appendChild(script);
    }
  }

  // Initialise la vidéo YouTube et configure les options
  init() {
    this.setOptions(); // Configure les options en fonction des attributs data

    this.initPlayer = this.initPlayer.bind(this);

    // Si 'data-action' est présent, on lance la vidéo automatiquement
    if (this.actionPlay) {
      this.initPlayer(); // Démarre immédiatement si l'attribut 'data-action' est présent
    } else if (this.poster) {
      // Si un poster est présent, clique sur le poster pour lancer la vidéo
      this.element.addEventListener('click', this.initPlayer);
    }
  }

  // Initialise le lecteur vidéo YouTube
  initPlayer(event) {
    if (event) {
      this.element.removeEventListener('click', this.initPlayer);
    }

    // Crée un nouveau lecteur YouTube avec les options configurées
    this.player = new YT.Player(this.youtubeContainer, {
      height: '100%', // Hauteur de la vidéo
      width: '100%', // Largeur de la vidéo
      videoId: this.youtubeId, // ID de la vidéo YouTube à lire
      playerVars: {
        rel: this.options.rel, // Paramètre de suggestion de vidéos similaires
        autoplay: 1, // Forcer la lecture automatique pour 'data-action'
        controls: this.options.controls, // Affichage des contrôles de lecture
        mute: this.actionPlay ? 1 : 0, // Muter uniquement les vidéos avec 'data-action'
        loop: this.options.loop, // Activer ou non la boucle
        playlist: this.youtubeId, // Nécessaire pour activer la boucle avec l'API YouTube
      },
      events: {
        onReady: () => {
          this.playerReady = true;

          // Si la vidéo doit démarrer automatiquement avec 'data-action'
          if (this.actionPlay) {
            console.log('Lecture automatique de la vidéo avec data-action en mode muet, avec boucle activée.');
            this.player.playVideo(); // Démarre la vidéo en sourdine
          }

          // Si un poster est présent et la vidéo n'est pas 'data-action'
          if (this.poster) {
            this.poster.style.display = 'none'; // Cache le poster
          }

          // Observateur pour pause/lecture selon la visibilité
          const observer = new IntersectionObserver(this.watch.bind(this), {
            rootMargin: '0px 0px 0px 0px', // Marge de la racine pour l'intersection
          });
          observer.observe(this.element);
        },
        onStateChange: (event) => {
          if (event.data == YT.PlayerState.PLAYING) {
            this.element.style.zIndex = 2;  // Appliquer sur .youtube (élément parent)
            Youtube.pauseAll(this); // Mettre en pause les autres vidéos
          } else if (event.data == YT.PlayerState.PAUSED || event.data == YT.PlayerState.ENDED) {
            this.element.style.zIndex = 0;  // Appliquer sur .youtube (élément parent)
          }
        },
      },
    });
  }

  // Met en pause la vidéo si elle sort de la zone visible
  watch(entries) {
    if (this.playerReady && !entries[0].isIntersecting) {
      this.player.pauseVideo();
    }
  }

  // Configure les options du lecteur vidéo en fonction des attributs data
  setOptions() {
    if ('noControls' in this.element.dataset) {
      this.options.controls = 0; // Désactive les contrôles de lecture si 'data-no-controls' est présent
    }
    if ('noRel' in this.element.dataset) {
      this.options.rel = 0; // Désactive les suggestions de vidéos similaires si 'data-no-rel' est présent
    }
    if ('loop' in this.element.dataset) {
      this.options.loop = 1; // Active la boucle si 'data-loop' est présent
    }
    if ('autoplay' in this.element.dataset) {
      this.options.autoplay = 1; // Active la lecture automatique si 'data-autoplay' est présent
    }
  }

  // Initialise toutes les instances de vidéos YouTube lorsque l'API YouTube est prête
  static initAll() {
    document.documentElement.classList.add('is-youtube-ready');

    for (let i = 0; i < Youtube.instances.length; i++) {
      const instance = Youtube.instances[i];
      instance.init();
    }
  }

  // Met en pause toutes les vidéos sauf celle spécifiée
  static pauseAll(currentInstance) {
    for (let i = 0; i < Youtube.instances.length; i++) {
      const instance = Youtube.instances[i];
      if (instance.playerReady && instance !== currentInstance) {
        instance.player.pauseVideo();
      }
    }
  }
}

// Liste des instances de vidéos YouTube
Youtube.instances = [];

// Fonction appelée lorsque l'API YouTube est prête
window.onYouTubeIframeAPIReady = Youtube.initAll;
