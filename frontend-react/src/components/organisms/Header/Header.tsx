import { Search } from '../../molecules/Search'

const Header = () => {
  return (
    <header className="p-4 bg-gray-100 text-gray-800">
      <div className="container flex justify-between p-2 h-16 mx-auto">
        <a
          href="/"
          aria-label="Back to homepage"
          className="flex items-center p-2  "
        >
          <span className="text-2xl lg:text-3xl">Vidify</span>
        </a>
        <Search />
      </div>
    </header>
  )
}

export default Header
