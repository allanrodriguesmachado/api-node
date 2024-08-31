import http from "node:http";

const server = http.createServer(async (request, response) => {
    const {method, url} = request;

    if(method === "POST" && url === '/products') {
        const buffers = [];

        for await (const chunk of request) {
            buffers.push(chunk);
        }

        console.log(Buffer.concat(buffers).toString());

    }

    return response.writeHead(200).end(`Hello World, ${url}`)
});

server.listen(8080)