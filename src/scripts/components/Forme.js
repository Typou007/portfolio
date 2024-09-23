export default class Forme {
  constructor(element) {
    this.element = element; // Stocke l'élément DOM du formulaire
    this.formElements = this.element.elements; // Stocke les éléments de formulaire
    this.init(); // Initialise le formulaire
  }

  init() {
    this.element.setAttribute('novalidate', ''); // Ajoute l'attribut 'novalidate' au formulaire pour désactiver la validation HTML5 par défaut

    for (let i = 0; i < this.formElements.length; i++) { // Itère à travers tous les éléments de formulaire
      const input = this.formElements[i]; // Récupère l'élément de formulaire actuel

      if (input.required) { // Vérifie si l'élément de formulaire est requis
        input.addEventListener('input', this.validateInput.bind(this)); // Ajoute un écouteur d'événements pour valider l'entrée lorsque l'utilisateur saisit quelque chose
      }
    }

    this.element.addEventListener('submit', this.onSubmit.bind(this)); // Ajoute un écouteur d'événements pour intercepter la soumission du formulaire
  }

  onSubmit(event) {
    event.preventDefault(); // Empêche le comportement de soumission par défaut du formulaire

    if (this.validate()) { // Vérifie si le formulaire est valide
      console.log('success'); // Affiche un message de réussite dans la console
      // Envoie le formulaire via AJAX
      this.showConfirmation(); // Affiche une confirmation de soumission du formulaire
    } else {
      console.log('fail'); // Affiche un message d'échec dans la console si le formulaire n'est pas valide
    }
  }

  validate() {
    let isValid = true; // Initialise une variable pour suivre l'état de validation du formulaire
    for (let i = 0; i < this.formElements.length; i++) { // Itère à travers tous les éléments de formulaire
      const input = this.formElements[i]; // Récupère l'élément de formulaire actuel

      if (input.required && !this.validateInput(input)) { // Vérifie si l'élément de formulaire est requis et valide
        isValid = false; // Si l'élément de formulaire n'est pas valide, définir isValid sur false
      }
    }
    return isValid; // Renvoie l'état de validation global du formulaire
  }
  validateInput(event) {
    const input = event.currentTarget || event; // Récupère l'élément de formulaire à valider

    if (input.validity.valid) { // Vérifie si l'entrée est valide 
      this.removeError(input); // Supprime les messages d'erreur
    } else {
      this.addError(input); // Ajoute les messages d'erreur
    }

    return input.validity.valid; // Renvoie l'état de validation 
  }

  addError(input) {
    const container =
      input.closest('[data-input-container]') || input.closest('.input'); // Trouve le conteneur de l'élément de formulaire
    container.classList.add('error'); // Ajoute la classe d'erreur pour indiquer l'état de invalidation
  }

  removeError(input) {
    const container =
      input.closest('[data-input-container]') || input.closest('.input'); // Trouve le conteneur de l'élément de formulaire
    container.classList.remove('error'); // Supprime la classe d'erreur pour indiquer l'état de invalidation
  }

  showConfirmation() {
    this.element.classList.add('is-sent'); // Ajoute une classe pour indiquer que le formulaire a été envoyé avec succès
  }
}