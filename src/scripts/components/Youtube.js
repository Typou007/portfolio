// Classe Youtube pour intégrer des vidéos YouTube
export default class Youtube {
  constructor(element) {
    this.element = element;

    // Sélectionne les éléments nécessaires de la vidéo YouTube
    this.youtubeContainer = this.element.querySelector('.js-youtube');
    this.poster = this.element.querySelector('.js-poster');
    this.youtubeId = this.element.dataset.youtubeId;
    // Détermine si la lecture automatique est activée en fonction de la présence d'un poster
    this.autoplay = this.poster ? 1 : 0;
    this.playerReady = false;

    // Ajoute cette instance à la liste des instances de Youtube
    Youtube.instances.push(this);

    // Charge le script de l'API YouTube si nécessaire
    if (this.youtubeId) {
      Youtube.loadScript();
    } else {
      console.error('vous devez spécifier un id');
    }

    // Options par défaut pour la vidéo YouTube
    this.options = {
      rel: 1, // Affiche les vidéos suggérées à la fin de la lecture
      controls: 1, // Affiche les contrôles de lecture
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
    this.initPlayer = this.initPlayer.bind(this);

    // Initialise le lecteur lorsque l'utilisateur clique sur le poster ou automatiquement si aucun poster n'est présent
    if (this.poster) {
      this.element.addEventListener('click', this.initPlayer);
    } else {
      this.initPlayer();
    }

    this.setOptions(); // Configure les options en fonction des attributs data
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
        autoplay: this.autoplay, // Lecture automatique
        controls: this.options.controls, // Affichage des contrôles de lecture
      },
      events: {
        // Gère les événements du lecteur vidéo YouTube
        onReady: () => {
          this.playerReady = true;

          // Initialise un observateur d'intersection pour la lecture automatique
          const observer = new IntersectionObserver(this.watch.bind(this), {
            rootMargin: '0px 0px 0px 0px', // Marge de la racine pour l'intersection
          });
          observer.observe(this.element);
        },
        onStateChange: (event) => {
          // Met en pause les autres vidéos lorsqu'une vidéo commence à être lue
          if (event.data == YT.PlayerState.PLAYING) {
            Youtube.pauseAll(this);
          }
          // Ramène la lecture au début et met en pause la vidéo lorsque celle-ci se termine
          else if (event.data == YT.PlayerState.ENDED) {
            this.player.seekTo(0);
            this.player.pauseVideo();
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

  // Configure les options du lecteur vidéo en fonction des attributs data
  setOptions() {
    if ('noControls' in this.element.dataset) {
      this.options.controls = 0; // Désactive les contrôles de lecture
    }
    if ('noRel' in this.element.dataset) {
      this.options.rel = 0; // Désactive les suggestions de vidéos similaires
    }
  }
}

// Liste des instances de vidéos YouTube
Youtube.instances = [];

// Fonction appelée lorsque l'API YouTube est prête
window.onYouTubeIframeAPIReady = Youtube.initAll;