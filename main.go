package main

import (
	"html/template"
	"log"
	"net/http"
)

// Parsing the template file
var tmpl = template.Must(template.ParseFiles("template.html"))

// The handler for the landing page
func handler(w http.ResponseWriter, r *http.Request) {
	// Set your RID value here. In a real application, this would be dynamic.
	rid := "12345"

	// Pass the RID to the template.
	err := tmpl.Execute(w, map[string]interface{}{
		"RID": rid,
	})
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
	}
}

// The handler for processing the track URL
func trackHandler(w http.ResponseWriter, r *http.Request) {
	// Get the RID from the query parameters
	rid := r.URL.Query().Get("rid")
	if rid == "" {
		http.Error(w, "Missing RID", http.StatusBadRequest)
		return
	}

	// Parse the form data
	err := r.ParseForm()
	if err != nil {
		http.Error(w, "Failed to parse form data", http.StatusBadRequest)
		return
	}

	// Extract the form data
	name := r.FormValue("name")
	nric := r.FormValue("nric")
	division := r.FormValue("division")
	position := r.FormValue("position")
	phoneNumber := r.FormValue("phone_number")
	staffID := r.FormValue("staff_id")

	// Log the form data (as an example)
	log.Printf("Form submitted with RID=%s, Name=%s, NRIC=%s, Division=%s, Position=%s, Phone=%s, StaffID=%s",
		rid, name, nric, division, position, phoneNumber, staffID)

	// Redirect to a thank-you page
	http.Redirect(w, r, "/thank_you.html", http.StatusSeeOther)
}

func main() {
	http.HandleFunc("/landing", handler)
	http.HandleFunc("/track", trackHandler)
	log.Fatal(http.ListenAndServe(":3333", nil))
}
