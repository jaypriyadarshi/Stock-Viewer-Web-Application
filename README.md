# Stock-Viewer-Web-Application

Web application which takes lets a user input a company's name and does the following:

- based on the keystrokes, calls a REST API to find to suggest company names
- After the user selects the company name, a request is made to Markit on Demand REST API to retreive Stock information
- Requests are also made to Bing API to get latest news for the company and draw a graph using Highcharts API to visualize the stock data
