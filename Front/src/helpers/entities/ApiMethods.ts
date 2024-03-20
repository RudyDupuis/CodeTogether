export class ApiMethods {
  private baseUrl: string = 'https://localhost:5001/api'

  async getData(endpoint: string) {
    const url = `${this.baseUrl}/${endpoint}`
    const response = await fetch(url)
    return response.json()
  }

  async postData(endpoint: string, data: any) {
    const url = `${this.baseUrl}/${endpoint}`
    const response = await fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
    return response.json()
  }

  async putData(endpoint: string, data: any) {
    const url = `${this.baseUrl}/${endpoint}`
    const response = await fetch(url, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
    return response.json()
  }

  async deleteData(endpoint: string) {
    const url = `${this.baseUrl}/${endpoint}`
    const response = await fetch(url, {
      method: 'DELETE'
    })
    return response.json()
  }
}
