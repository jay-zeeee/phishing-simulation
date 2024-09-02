package main

import (
	"html/template"
	"net/http"
)

// Assuming PhishingTemplateContext is defined in a models package
type PhishingTemplateContext struct {
	RID string
}

var tmpl = template.Must(template.ParseFiles("template.html"))

func handler(w http.ResponseWriter, r *http.Request) {
	rid := "12345" // This should be dynamically generated or retrieved

	// Create an instance of PhishingTemplateContext
	ctx := PhishingTemplateContext{
		RID: rid, // Set the RID field
	}

	// Render the template with the context
	err := tmpl.Execute(w, ctx)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
	}
}

func main() {
	http.HandleFunc("/landing", handler)
	http.ListenAndServe(":3333", nil)
}
