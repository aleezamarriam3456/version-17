<?php
header('Content-Type: text/plain');

// Extended answers database (key-value pairs)
$answers = [
    "What is your name?" => "I am The Elegant Atelier's virtual assistant.",
    "What do you sell?" => "We sell elegant rings, necklaces, earrings, and more.",
    "Where are you located?" => "We are an online store accessible worldwide.",
    "How can I contact you?" => "You can reach us at contact@elegantatelier.com.",
    "What are your prices?" => "Our prices vary depending on the product. Visit our shop for details.",
    "What is your return policy?" => "We offer a 30-day return policy on all items in their original condition.",
    "Do you offer discounts?" => "Yes, we offer seasonal discounts and special promotions for members.",
    "How can I track my order?" => "Once your order is shipped, you will receive a tracking number via email.",
    "Do you provide international shipping?" => "Yes, we ship to over 50 countries worldwide.",
    "What payment methods do you accept?" => "We accept Visa, MasterCard, PayPal, and more.",
    "Do you offer gift wrapping?" => "Yes, gift wrapping is available at checkout for a small fee.",
    "How long does delivery take?" => "Delivery usually takes 3-7 business days, depending on your location.",
    "Can I customize my order?" => "Yes, we offer customization on select items. Please contact us for details.",
    "Are your products made of real gold?" => "Yes, all our gold products are made from certified real gold.",
    "What is the warranty on your products?" => "Our products come with a one-year warranty against manufacturing defects.",
    "Can I cancel my order?" => "Orders can be canceled within 24 hours of placing them. Contact our support team for assistance.",
    "Do you have a physical store?" => "No, we are an online-only store, offering convenience and savings.",
    "How do I care for my jewelry?" => "We recommend keeping your jewelry away from chemicals and storing it in a dry place.",
    "Can I request a custom design?" => "Yes, we accept custom design requests. Please provide details, and we’ll work with you to create your dream piece.",
    "What materials do you use?" => "We use high-quality gold, silver, diamonds, and gemstones in our products.",
    "How do I create an account?" => "Click on the 'Sign Up' button on our website and follow the instructions to create an account.",
    "Can I change my shipping address?" => "Yes, you can update your shipping address before your order is shipped. Contact us for assistance.",
    "Do you offer wholesale options?" => "Yes, wholesale options are available. Please contact us for further details.",
    "Do you have a loyalty program?" => "Yes, join our loyalty program to earn points on purchases and enjoy exclusive rewards."
];

// Retrieve the question from the POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['question'])) {
    $question = trim($_POST['question']);

    // Check if the question exists in the database
    if (array_key_exists($question, $answers)) {
        echo $answers[$question];
    } else {
        echo "Sorry, I don't have an answer to that question.";
    }
} else {
    echo "No question received.";
}
?>
