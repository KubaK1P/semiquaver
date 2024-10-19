import flask

app  = flask.Flask("app")

@app.get("/api/data")
def get_data():
    return {"data": 123}


app.run()